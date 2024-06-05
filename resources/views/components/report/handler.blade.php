@if (Route::is('report.*') === false)
    <a href="{{ route('report.create') }}" target="_blank" class="button button-small bg-gray-900 text-gray-200">
        <x-heroicon-o-bug-ant class="h-4 w-4 text-rose-500" />
        <span class="text-xs">Nahlásit chybu</span>
    </a>
@endif
