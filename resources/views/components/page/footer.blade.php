<footer class="mt-8 pb-8 text-sm text-neutral-400 content-container">
    <div class="space-y-1 text-xs">
        <p>
            {{ config('app.name') }} &copy; {{ config('kitsheet.year')}} - {{ now()->year }}
            <a href="{{ config('kitsheet.author_url') }}" target="_blank" class="hover:underline text-neutral-100">{{ config('kitsheet.author') }}</a> ({{ config('kitsheet.author_email') }}).
        </p>
        <p>{!! __('footer.text_1') !!}</p>
        <p>{!! __('footer.text_2') !!}</p>
    </div>
    <div class="mt-4">
        @if (Route::is('report.*') === false)
            <a href="{{ localizedRoute('report.create') }}" target="_blank" class="button button-small bg-slate-800 text-gray-300">
                <x-heroicon-o-bug-ant class="h-4 w-4 text-rose-500" />
                <span class="text-xs">
                    {{ __('footer.report_bug') }}
                </span>
            </a>
        @endif
    </div>
</div>
