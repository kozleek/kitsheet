<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#444E5D"/>

    <!-- HTML Meta Tags -->
    <title>{{ $pageTitle }} </title>
    <meta name="description" content="{{ $pageDescription }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="kitsheet.cz">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sometype+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    @production
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ config('scripts.gtm') }}');</script>
        <!-- End Google Tag Manager -->
    @endproduction

    @yield('scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full bg-gradient-to-b from-gray-600 to-gray-700 antialiased relative" x-data="{modal:''}">
    @production
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('scripts.gtm') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endproduction

    <div class="bg-slate-800">
        @if ($disableEdit)
            <x-page.announcement>
                <strong class="font-semibold">Sadu již nelze editovat</strong>, <span class="text-white">byl vyplněný min. jeden příklad. <br />V případě potřeby si <a href="{{ localizedRoute('kit.create') }}" target="_blank" class="underline hover:no-underline">vytvořte novou sadu</a>.</span>
            </x-page.announcement>
        @endif

        <x-page.header :title="$title" :description="$description">
            <x-slot name="actions">
                @yield('actions')
            </x-slot>
            <x-slot name="info">
                @yield('info')
            </x-slot>
        </x-page.header>
    </div>
    <main class="content-container my-8">
        @yield('content')
    </main>
    <x-page.footer />
    @yield('modals')

    @livewireScriptConfig
</body>

</html>
