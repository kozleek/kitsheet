@props(['title' => '', 'description' => '', 'info' => '', 'actions' => ''])

<div class="min-h-full">
    <div class="bg-slate-800">
        @if ($actions != '')
            <nav class="bg-slate-800">
                <div class="content-container">
                    <div class="border-b border-gray-700">
                        <div class="flex h-16 items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex items-baseline gap-4">
                                    {{ $actions }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        @endif
        <header class="py-10">
            <div class="content-container">
                @if (Route::isLocalized() || Route::isFallback())
                    <ul class="mb-4">
                        @foreach(LocaleConfig::getLocales() as $locale)
                            @if ( ! App::isLocale($locale))
                                <li>
                                    <a href="{{ Route::localizedUrl($locale) }}" class="bg-pink-400 rounded text-white text-xs p-2">
                                        {{ strtoupper($locale) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

                @if ($title)
                    <h1 class="text-3xl font-bold tracking-tight text-white">{{ $title }}</h1>
                @endif

                @if ($description)
                    <p class="text-balance mt-2 text-sm leading-5 text-white">
                        {{ $description }}
                    </p>
                @endif

                @if ($info)
                    {{ $info }}
                @endif
            </div>
        </header>
    </div>
</div>

<div class="hidden py-8">
    @if ($actions)
        <div class="mb-4 flex flex-1 flex-col justify-start gap-2 md:mb-6 md:flex-row">
            {{ $actions }}
        </div>
    @endif

    <div class="">

    </div>
</div>
