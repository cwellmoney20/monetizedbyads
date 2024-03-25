<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\Url;
use App\Models\Network;
use Carbon\Carbon;

class Urls extends Component
{
    use WithPagination;

    public $filters = [
        'urlContains' => '',
        'urlNotContains' => '',
        'networks' => [
            1, 2, 3, 4
        ],
        'dateFrom' => '',
        'dateTo' => '',
    ];

    public $orderBy = 'created_at';

    public $orderDir = 'desc';

    public $networks;

    public function mount()
    {
        $this->networks = Network::all();
    }

    public function getUrls()
    {
        return Url::with(['networks', 'history' => function ($query) {
            $query->orderBy('found_at', 'desc');
        }])
        ->when($this->filters['urlContains'], function ($query, $urlContains) {
            return $query->where('url', 'like', "%{$urlContains}%");
        })
        ->when($this->filters['urlNotContains'], function ($query, $urlNotContains) {
            return $query->where('url', 'not like', "%{$urlNotContains}%");
        })
        ->when($this->filters['networks'], function ($query, $networks) {
            return $query->whereHas('networks', function ($query) use ($networks) {
                $query->whereIn('networks.id', $networks);
            });
        })
        // if there are no filters, show nothing
        ->when($this->hasFilters(), function ($query) {
            return $query;
        }, function ($query) {
            return $query->where('id', 0);
        })
        ->when($this->filters['dateFrom'], function ($query, $dateFrom) {
            return $query->whereHas('history', function ($query) use ($dateFrom) {
                $query->where('found_at', '>=', $dateFrom);
            });
        })
        ->when($this->filters['dateTo'], function ($query, $dateTo) {
            return $query->whereHas('history', function ($query) use ($dateTo) {
                $query->where('found_at', '<=', $dateTo);
            });
        })
        ->where('enabled', true)
        ->orderBy($this->orderBy, $this->orderDir)
        ->paginate(100);
    }

    public function hasFilters() {
        foreach ($this->filters as $key => $value) {
            if ($value !== false && $value !== null && $value !== [] && $value !== '') {
                return true;
            }
        }
        return false;
    }

    public function removeFilter($filter)
    {
        if(is_array($this->filters[$filter])) {
            $this->filters[$filter] = [];
        } else {
            $this->filters[$filter] = '';
        }
    }

    public function removeNetworkFilter($id)
    {
        $this->filters['networks'] = array_diff($this->filters['networks'], [$id]);
    }

    public function handleSorting($column)
    {
        $this->orderBy = $column;

        $this->orderDir = $this->orderDir == 'asc' ? 'desc' : 'asc';
    }

    public function toggleNetwork($networkId)
    {
        if (($key = array_search($networkId, $this->filters['networks'])) !== false) {
            unset($this->filters['networks'][$key]);
        } else {
            $this->filters['networks'][] = $networkId;
        }
    }

    public function render()
    {
        return view('livewire.urls', [
            'urls' => $this->getUrls(),
        ]);
    }
}
