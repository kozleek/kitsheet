<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
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

    @yield('scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full bg-gradient-to-b from-gray-600 to-gray-700 antialiased" x-data="{modal:null}">

    <x-page.header :title="$title" :description="$description">
        <x-slot name="actions">
            @yield('actions')
        </x-slot>
        <x-slot name="info">
            @yield('info')
        </x-slot>
    </x-page.header>
    <main class="content-container my-8">
        @yield('content')
    </main>
    @yield('modals')

</body>

</html>
