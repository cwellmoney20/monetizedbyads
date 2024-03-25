<span class="inline-flex items-center gap-x-0.5 rounded-md bg-teal-50 my-1 px-2 py-1 text-sm font-medium text-teal-700 ring-1 ring-inset ring-teal-700/10">
    {{$label}}
    <button type="button" wire:click="{{$removeMethod}}" class="group relative -mr-1 h-3.5 w-3.5 rounded-full hover:bg-teal-600/20">
      <span class="sr-only">Remove</span>
      <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-teal-700/50 group-hover:stroke-teal-700/75">
        <path d="M4 4l6 6m0-6l-6 6" />
      </svg>
      <span class="absolute -inset-1"></span>
    </button>
</span>
