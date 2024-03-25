<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Network;
use App\Jobs\ProcessNetworkSellers;

class ParseNetworks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-networks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily command to parse networks and update the database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $network = Network::find(1);
        // ProcessNetworkSellers::dispatch($network);
        $networks = Network::all();

        foreach ($networks as $index => $network) {
            $delay = now()->addSeconds(15 * $index);
            ProcessNetworkSellers::dispatch($network)->delay($delay);
        }
    }
}
