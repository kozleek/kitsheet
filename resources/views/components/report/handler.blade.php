@if (Route::is('report.*') === false)
    <a href="{{ route('report.create') }}" target="_blank" class="button button-small bg-slate-800 text-gray-300">
        <x-heroicon-o-bug-ant class="h-4 w-4 text-rose-500" />
        <span class="text-xs">Nahlásit chybu</span>
    </a>
@endif
