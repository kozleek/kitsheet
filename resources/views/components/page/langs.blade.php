@if (Route::isLocalized() || Route::isFallback())
    <ul class="flex gap-2 items-center">
        @foreach(LocaleConfig::getLocales() as $locale)
            @if ( ! App::isLocale($locale))
                <li>
                    <a href="{{ Route::localizedUrl($locale) }}" class="action action-normal !text-[10px] !py-1 !px-2">
                        {{ strtoupper($locale) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif
