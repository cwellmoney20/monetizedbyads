<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <meta name="description" content="{{ $description ?? 'Find high-traffic keywords you already rank for and improve your content to increase traffic, rank higher, and double down on what\'s already working.' }}">

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.png')) }}" media="(prefers-color-scheme: light)" />
        <link rel="shortcut icon" href="{{ url(asset('favicon-white.png')) }}" media="(prefers-color-scheme: dark)" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
        <meta property="og:description" content="{!! $description ?? config('app.desc') !!}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ \Illuminate\Support\Facades\URL::full() }}" />
        <meta property="og:image" content="{{asset('mba.png')}}" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@iannuttall" />
        <meta name="twitter:title" content="{{ $title ?? config('app.name') }}" />
        <meta name="twitter:description" content="{!! $description ?? config('app.desc') !!}" />
        <meta name="twitter:image" content="{{asset('mba.png')}}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <script async data-id="101447539" src="//static.getclicky.com/js"></script>
    </head>

    <body>
        @include('partials.nav')
        @yield('body')
        @livewireScripts
    </body>
</html>
