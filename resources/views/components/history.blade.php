
<div x-data="{ open: false }" class="flex justify-center overflow-auto">
    <!-- Trigger -->
    <span x-on:click="open = true">
        <button type="button" class="rounded-md bg-white px-3 py-2 text-sm text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 font-medium ">
            View history
        </button>
    </span>

    <!-- Modal -->
    <div
        x-show="open"
        style="display: none"
        x-on:keydown.escape.prevent.stop="open = false"
        role="dialog"
        aria-modal="true"
        x-id="['modal-title']"
        :aria-labelledby="$id('modal-title')"
        class="fixed inset-0 z-10 "
    >
        <!-- Overlay -->
        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

        <!-- Panel -->
        <div
            x-show="open" x-transition
            x-on:click="open = false"
            class="relative flex min-h-screen items-center justify-center p-4"
        >
            <div
                x-on:click.stop
                x-trap.noscroll.inert="open"
                class="relative w-full max-w-2xl rounded-xl bg-white p-12 shadow-lg prose"
            >
                <!-- Title -->
                <h2 class="text-3xl font-medium mb-1" :id="$id('modal-title')">
                History of {{$url}}
                </h2>

                <!-- Content -->
                <p class="mt-2 text-gray-600">
                    Below are all of the changes we have logged for this URL.
                </p>

                <ol class="relative border-s border-gray-200 text-left list-none">
                    @foreach($urlHistory as $history)
                    <li class="mb-5">
                        <div class="absolute w-3 h-3 bg-gray-300 rounded-full mt-1.5 -start-1.5 border border-white"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400">
                            {{$history->created_at->format('F j, Y')}}
                        </time>
                        <h3 class="text-lg font-semibold text-gray-900 mt-1 mb-0">
                            @if($history->found_at)
                            Found on {{$history->network->name}}
                            @elseif($history->removed_at)
                            Removed from {{$history->network->name}}
                            @endif
                        </h3>
                        {{-- <p class="mb-4 text-base font-normal text-gray-500 break-words">
                            Here is a bunch of long text to show how this modal overflows pretty badly and doesn't wrap this text properly like it should. Why?
                        </p> --}}
                    </li>
                    @endforeach
                </ol>

                <!-- Buttons -->
                {{-- <div class="mt-8 flex space-x-2">
                    <button type="button" x-on:click="open = false" class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Confirm
                    </button>

                    <button type="button" x-on:click="open = false" class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                        Cancel
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
