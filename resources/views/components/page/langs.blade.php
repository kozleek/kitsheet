@if (Route::isLocalized() || Route::isFallback())
    <ul class="flex gap-2 items-center">
        @foreach(LocaleConfig::getLocales() as $locale)
            @if ( ! App::isLocale($locale))
                <li>
                    <a href="{{ Route::localizedUrl($locale) }}" class="action action-normal">
                        {{ strtoupper($locale) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
