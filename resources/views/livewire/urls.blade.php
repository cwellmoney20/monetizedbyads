<div class="w-full">
    <div class="relative">
        @component('components.flyout', ['fullWidth' => true, 'left' => '0'])
            @slot('button')
            <button
                @click="open = !open"
                :class="open ? 'bg-teal-600 text-white ring-teal-700/10' : 'bg-white text-gray-900'"
                x-tooltip.raw="Filter URLs"
                class="ml-auto rounded-md px-3 h-10 text-sm duration-200 ease-in-out shadow-sm ring-1 ring-inset ring-gray-200 hover:bg-teal-50 hover:border-teal-300 hover:text-teal-600 hover:ring-teal-700/10 items-center font-medium transition-all inline-block lg:inline mb-1"
                >
                Filters
            </button>
            @endslot
            <div class="p-5 space-y-5 text-md text-gray-700">
                <div class="block sm:flex">
                    <div class="w-full sm:w-1/2 p-3">
                        <p class="text-sm text-gray-700">
                            URL contains
                        </p>
                        <div class="flex items-center space-x-2 mt-2">
                            <input
                                wire:model.live="filters.urlContains"
                                type="text"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 text-md"
                                placeholder="enter a word to filter"
                            >
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 p-3">
                        <p class="text-sm text-gray-700">
                            URL doesn't contain
                        </p>
                        <div class="flex items-center space-x-2 mt-2">
                            <input
                                wire:model.live="filters.urlNotContains"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 text-md"
                                placeholder="enter a word to filter"
                            >
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-2/3 p-3">
                    <p class="text-sm text-gray-700 mb-3">
                        Networks
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 gap-y-3">
                    @foreach($networks as $network)
                        <div class="inline-flex items-center">
                            <button
                                wire:click.prevent="toggleNetwork({{ $network->id }})"
                                class="{{ in_array($network->id, $filters['networks']) ? 'bg-teal-600' : 'bg-gray-200' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-offset-2"
                                role="switch"
                                aria-checked="{{ in_array($network->id, $filters['networks']) ? 'true' : 'false' }}"
                            >
                                <span class="sr-only">{{ $network->name }}</span>
                                <span class="{{ in_array($network->id, $filters['networks']) ? 'translate-x-5' : 'translate-x-0' }} inline-block w-5 h-5 transform bg-white rounded-full transition duration-200 ease-in-out"></span>
                            </button>
                            <label
                                for="network-{{ $network->id }}"
                                class="mx-3 text-sm text-gray-700 cursor-pointer truncate"
                                wire:click.prevent="toggleNetwork({{ $network->id }})"
                                title="{{ $network->name }}"
                            >
                                {{ $network->name }}
                            </label>
                        </div>
                    @endforeach
                    </div>
                </div>
                {{-- date added from and to --}}
                <div class="flex items">
                    <div class="w-full sm:w-1/2 p-3">
                        <p class="text-sm text-gray-700">
                            Date Found From
                        </p>
                        <div class="flex items mt-3">
                            <input
                                wire:model.live="filters.dateFrom"
                                type="date"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 text-md"
                            >
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 p-3">
                        <p class="text-sm text-gray-700">
                            Date Found To
                        </p>
                        <div class="flex items mt-3">
                            <input
                                wire:model.live="filters.dateTo"
                                type="date"
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-teal-600 text-md"
                            >
                        </div>
                    </div>
                </div>
            </div>
        @endcomponent
    </div>
    @if($this->hasFilters())
    <div>
        <div class="mt-2 mb-4">
            <div class="text-md mt-3">
                <div class="inline-block space-x-2">
                    @includeWhen($filters['urlContains'], 'partials.badge', [
                        'label' => 'URL contains: ' . $filters['urlContains'],
                        'removeMethod' => "removeFilter('urlContains')"
                        ]
                    )
                    @foreach($filters['networks'] as $network)
                        @include('partials.badge', [
                            'label' => $networks->find($network)->name,
                            'removeMethod' => "removeNetworkFilter({$network})"
                            ]
                        )
                    @endforeach
                    @includeWhen($filters['urlNotContains'], 'partials.badge', [
                        'label' => 'URL doesn\'t contain: ' . $filters['urlNotContains'],
                        'removeMethod' => "removeFilter('urlNotContains')"
                        ]
                    )
                    @includeWhen($filters['dateFrom'], 'partials.badge', [
                        'label' => 'Date found from ' . (new DateTime($filters['dateFrom']))->format('M j, Y'),
                        'removeMethod' => "removeFilter('dateFrom')"
                    ])
                    @includeWhen($filters['dateTo'], 'partials.badge', [
                        'label' => 'Date found to ' . (new DateTime($filters['dateTo']))->format('M j, Y'),
                        'removeMethod' => "removeFilter('dateTo')"
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="overflow-auto lg:overflow-hidden ring-1 ring-black ring-opacity-5 sm:rounded-lg mt-5 relative">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="w-96 truncate px-6 py-3 text-left text-sm text-gray-500 whitespace-normal font-medium"
                        wire:click="handleSorting('url')"
                    >
                    <span class="flex items-center cursor-pointer">
                        URL
                        @if($orderBy == 'url')
                            @if($orderDir == 'asc')
                                <x-heroicon-m-bars-arrow-up
                                    class="w-4 h-4 ml-1 mt-1 text-gray-500"
                                />
                            @else
                                <x-heroicon-m-bars-arrow-down
                                    class="w-4 h-4 ml-1 mt-1 text-gray-500"
                                />
                            @endif
                        @else
                        <x-heroicon-m-chevron-up-down
                            class="w-4 h-4 ml-1 text-gray-500"
                        />
                        @endif
                    </span>
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-4 text-center text-sm text-gray-500 whitespace-normal font-medium"
                        wire:click="handleSorting('created_at')"
                    >
                    <span class="flex justify-center items-center cursor-pointer">
                        Date Added
                        @if($orderBy == 'created_at')
                            @if($orderDir == 'asc')
                                <x-heroicon-m-bars-arrow-up
                                    class="w-4 h-4 ml-1 mt-1 text-gray-500"
                                />
                            @else
                                <x-heroicon-m-bars-arrow-down
                                    class="w-4 h-4 ml-1 mt-1 text-gray-500"
                                />
                            @endif
                        @else
                        <x-heroicon-m-chevron-up-down
                            class="w-4 h-4 ml-1 text-gray-500"
                        />
                        @endif
                    </span>
                    </th>
                    <th
                        scope="col"
                        class=" w-60 px-6 py-4 text-center text-sm text-gray-500 whitespace-normal font-medium"
                    >
                        Network(s)
                    </th>
                    <th
                        scope="col"
                        class="px-6 py-4 text-center text-sm text-gray-500 whitespace-normal font-medium"
                    >
                        History
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @foreach($urls as $url)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap relative">
                            {{ $url->url }}
                            <br>
                            <a
                            x-data="{
                                'name': 'support',
                                'host': 'monetizedbyads',
                                'domain': 'com',
                            }"
                                x-bind:href="'mailto:' + name + '@' + host + '.' + domain + '?subject=Request removal of {{ $url->url }}'"
                                class="text-gray-500 text-xs hover:text-red-600">
                                Request removal
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            {{ $url->created_at->format('F j, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @foreach($url->networks as $network)
                                <span class="py-1 px-2 inline-flex leading-5 text-xs font-medium rounded-full {{$network->class}}">
                                    {{ $network->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-center">
                            <x-history :urlHistory="$url->history" :url="$url->url" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2 mb-8">
        {{$urls->links()}}
    </div>
</div>

