<footer class="mt-8 pb-8 text-sm text-neutral-400 content-container">
    <div class="space-y-1 text-xs">
        <p>{{ config('app.name') }} &copy; {{ config('kitsheet.year')}} - {{ now()->year }} <a href="https://www.musiol.cz" target="_blank" class="hover:underline text-neutral-100">Tomáš Musiol</a> (tomas.musiol@gmail.com).</p>
        <p>{!! __('footer.text_1') !!}</p>
        <p>{!! __('footer.text_2') !!}</p>
    </div>
    <div class="mt-4">
        @if (Route::is('report.*') === false)
            <a href="{{ route('report.create') }}" target="_blank" class="button button-small bg-slate-800 text-gray-300">
                <x-heroicon-o-bug-ant class="h-4 w-4 text-rose-500" />
                <span class="text-xs">
                    {{ __('footer.report_bug') }}
                </span>
            </a>
        @endif
    </div>
</div>
