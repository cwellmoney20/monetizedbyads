@if( !isset($hideFooter) || !$hideFooter )
<footer class="bg-gray-900" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 py-6">
      <div class="md:flex md:items-center md:justify-between">
        <!-- Copyright information -->
        <p class="text-sm leading-5 text-gray-400 md:order-1">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>

        <!-- Side by side links on the right -->
        <div class="mt-4 md:mt-0 md:order-2 flex space-x-6">
          <a href="{{route('privacy')}}" class="text-sm leading-5 text-gray-400 hover:text-gray-300 transition ease-in-out duration-150">Privacy</a>
            <a href="{{route('terms')}}" class="text-sm leading-5 text-gray-400 hover:text-gray-300 transition ease-in-out duration-150">Terms</a>
        </div>
      </div>
    </div>
</footer>
@endif
