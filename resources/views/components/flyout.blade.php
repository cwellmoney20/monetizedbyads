<div
    x-data="{ open: false }" class="inline {{!$fullWidth ? 'md:relative' : ''}}"
    x-init="() => {
        const keydownHandler = (event) => {
            if (event.key === 'Escape') {
                open = false;
            }
        };

        window.addEventListener('keydown', keydownHandler);
    }"
>
    {{ $button }}
    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-1"
         x-transform:origin="top right"
         @class([
             'absolute z-10 mt-2 flex',
             'w-full left-0' => $fullWidth,
             'left-1/2 transform -translate-x-1/2 w-full md:w-80' => !$fullWidth
         ])
         @click.away="open = false"
         >

         <div class="w-full flex-auto rounded-lg bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5">
            {{ $slot }}
        </div>
    </div>
</div>
