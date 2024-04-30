<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="theme-color" content="#6466F1"/>

    <!-- HTML Meta Tags -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="kitsheet.cz">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sometype+Mono:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('scripts.gtm') }}');</script>
    <!-- End Google Tag Manager -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full bg-neutral-100 antialiased" x-data="{modal:null}">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('scripts.gtm') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    @yield('announcement')
    <div class="pt-4 pb-12">
        <div class="container mx-auto px-4 2xl:px-0 2xl:max-w-7xl">
            @yield('content')
        </div>
        <footer class="mt-8 text-sm text-neutral-400 container mx-auto px-4 2xl:px-0 2xl:max-w-7xl">
            <div class="space-y-1">
                <p>KitSheet je jednoduchý (ale promyšlený) generátor pracovních listů do matematiky.</p>
                <p>&copy; 2021 - {{ now()->year }} <a href="https://www.musiol.cz" target="_blank" class="underline hover:no-underline text-neutral-600">Tomáš Musiol</a>. Všechna práva vyhrazena.</p>
            </div>
        </div>
    </div>
    @yield('modals')
</body>

</html>
