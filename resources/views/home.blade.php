@extends('components.layouts.app')

@section('content')
<div class="bg-white">
    <div class="mx-auto mb-0 max-w-7xl px-6 pt-5 pb-10 lg:flex lg:items-center lg:justify-center lg:space-x-12 lg:px-8">
        <div class="lg:w-3/5 text-left">
            <h1 class="text-base font-semibold leading-7 text-teal-600 text-center">New sites added daily</h1>
            <h2 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl text-center">
                Find sites that are being monetized by display ads, and which networks they are using
            </h2>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 text-center">
                Every day, we check for new sites added to the big ad networks and track which networks they are using or have moved to/from.
            </p>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 text-center">
                Often these sites have only just met the traffic threshold to be accepted, and can give an idea of the type of content sites that are doing well in Google.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4 mt-6">
                <img src="{{asset("images/mediavine.png")}}" alt="Mediavine" title="Mediavine" class="network-icon mr-1 h-[11px]">
                <img src="{{asset("images/adthrive.png")}}" alt="Raptive" title="Raptive" class="network-icon mr-1 h-[16px]">
                <img src="{{asset("images/ezoic.png")}}" alt="Ezoic" title="Ezoic" class="network-icon mr-1 h-[18px]">
                <img src="{{asset("images/freestar.png")}}" alt="Freestar" title="Freestar" class="network-icon mr-1 h-[19px]">
                <img src="{{asset("images/newormedia.png")}}" alt="Newor Media" title="Newor Media" class="network-icon mr-1 h-[14px]">
                <img src="{{asset("images/monumetric.png")}}" alt="Monumetric" title="Monumetric" class="network-icon mr-1 h-[15px]">
                <!-- <img src="{{asset("/images/networks.png")}}" alt="This is in order from best to worst ;)" title="This is in order from best to worst ;)"> -->
            </div>
            {{-- <div class="my-10 block lg:flex items-center text-center gap-4">
                <a href="" class="inline-block rounded-md bg-teal-600 px-5 py-4 text-lg font-medium text-white shadow-sm hover:bg-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">
                    Start optimizing content &rarr;
                </a>
                <div class="mt-4 lg:mt-0">
                    <a href="#features" class="text-lg font-medium leading-6 text-gray-700">Learn more</a>
                </div>

            </div> --}}

            </div>
    </div>
</div>
<div class="mx-auto mb-5 max-w-7xl px-6 pb-10 lg:flex lg:items-center lg:justify-center lg:space-x-12 lg:px-8">
<livewire:urls />
</div>
@endsection
