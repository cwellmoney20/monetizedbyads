<?php

namespace App\Jobs;

use App\Models\Network;
use App\Models\Url;
use App\Models\UrlNetwork;
use App\Models\UrlNetworkHistory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Middleware\WithoutOverlapping;

class ProcessNetworkSellers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $network;

    protected $timeout = 600;

    /**
     * Create a new job instance.
     */
    public function __construct(Network $network)
    {
        $this->network = $network;
    }

    /**
     * The job's middleware.
     *
     * @return array
     */
    // public function middleware(): array
    // {
    //     // Unique key for the WithoutOverlapping middleware
    //     $uniqueKey = 'ProcessNetworkSellers';

    //     return [new WithoutOverlapping($uniqueKey)];
    // }

    /**
     * Determine the time when the job should timeout.
     *
     * @return \DateTime
     */
    // public function retryUntil()
    // {
    //     return now()->addMinutes(5);
    // }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
            ]
        ]);

        try {
            $response = $client->request('GET', $this->network->sellers_json_url);
        } catch (GuzzleException $e) {
            throw $e;
        }

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        $sellers = $data['sellers'] ?? [];
        $domains = collect(array_column($sellers, 'domain'));
        // remove empty strings from $domains collection
        $domains = $domains->reject(function ($domain) {
            return $domain === '';
        });
        // remove null values from $domains collection
        $domains = $domains->reject(function ($domain) {
            return $domain === null;
        });
        $domains = $domains->map(function ($domain) {
            return strtolower($domain);
        });
        // remove duplicates from $domains collection
        $domains = $domains->unique();
        // remove mediavine.com from $domains collection
        // $domains = $domains->reject(function ($domain) {
        //     return $domain === 'mediavine.com';
        // });

        // logger('sellers.json count', [$domains->count()]);

        $existing_urls = Url::whereIn('url', $domains)->get()->pluck('id', 'url');

        // logger('existng url count', [$existing_urls->count()]);

        // $existing_associations = UrlNetwork::where('network_id', $this->network->id)
        //     ->whereIn('url_id', $existing_urls->values())
        //     ->pluck('url_id');

        $existing_associations = UrlNetwork::with('url')
            ->where('network_id', $this->network->id)
            ->whereIn('url_id', $existing_urls->values())
            ->get()
            ->pluck('url_id', 'url.url');

        $existing_network_domains = UrlNetwork::with('url')
            ->where('network_id', $this->network->id)
            ->get()
            ->pluck('url_id', 'url.url');

        // logger('existing associations count', [$existing_associations->count()]);

        // find the unique domains that are in $domains but not in $existing_associations
        $new_domains = $domains->diff($existing_associations->keys());

        // find the unique domains that are in $existing_associations but not in $domains



        // remove existing associations from $domains collection
        // $new_domains = $domains->reject(function ($domain) use ($existing_urls, $existing_associations) {
        //     $url_id = $existing_urls->get($domain);
        //     return $existing_associations->get($url_id);
        // });

        // logger('new domains count', [$new_domains->count()]);

        // logger('new domains', [$new_domains]);

        // any domains that have an association but are not in the sellers json $domains collection should be removed
        $domains_to_remove = $existing_network_domains->keys()->diff($domains);

        // logger('domains to remove count', [$domains_to_remove->count()]);

        // logger('domains to remove', [$domains_to_remove]);

        // logger('domains to remove count', [$domains_to_remove->count()]);

        // logger('domains to remove', [$domains_to_remove]);

        $new_urls = $new_domains->map(function ($domain) {
            return [
                'url' => $domain,
            ];
        });

        // insert new urls and get their ids
        $new_urls->chunk(5000)
            ->each(function ($chunk) {
                Url::upsert($chunk->toArray(), ['url']);
        });

        $new_url_ids = Url::whereIn('url', $new_urls)->get()->pluck('id', 'url');

        // insert new associations
        $new_associations = $new_url_ids->map(function ($url_id) {
            return [
                'network_id' => $this->network->id,
                'url_id' => $url_id,
                'uuid' => md5($this->network->id . $url_id),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        $new_associations->chunk(5000)
            ->each(function ($chunk) {
                UrlNetwork::upsert($chunk->toArray(), ['uuid']);
        });



        // After inserting new associations
        $new_associations_history = $new_url_ids->keys()->map(function ($url, $url_id) use ($new_url_ids) {
            return [
                'network_id' => $this->network->id,
                'url_id' => $new_url_ids[$url],
                'found_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        $new_associations_history->chunk(5000)
            ->each(function ($chunk) {
                try {
                    UrlNetworkHistory::insert($chunk->toArray());
                } catch (\Exception $e) {
                    logger('Error inserting new associations history', [$e->getMessage()]);
                }
            });

        // if we have domains_to_remove collection we need to remove the associations and update the history
        if ($domains_to_remove->isNotEmpty()) {
            $url_ids_to_remove = Url::whereIn('url', $domains_to_remove)->get()->pluck('id');
            UrlNetwork::where('network_id', $this->network->id)
                ->whereIn('url_id', $url_ids_to_remove)
                ->delete();

            // After removing associations
            $removed_associations_history = $url_ids_to_remove->map(function ($url_id) {
                return [
                    'network_id' => $this->network->id,
                    'url_id' => $url_id,
                    'removed_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            try {
                UrlNetworkHistory::insert($removed_associations_history);
            } catch (\Exception $e) {
                logger('Error inserting removed associations history', [$e->getMessage()]);
                logger('removed associations history', [$removed_associations_history]);
            }
        }
    }
}
