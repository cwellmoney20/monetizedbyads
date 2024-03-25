<nav class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-center">
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <a class="flex text-teal-600 hover:text-teal-500" href="{{route('home')}}">
                        <x-logo
                        class='text-teal-600 hover:text-teal-500 mr-1'
                        />
                        <span class="text-gray-900 inline-flex items-center px-1 text-xl font-semibold leading-tight">
                            {{ config('app.name') }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
