@if (Route::is('report.*') === false)
    <a href="{{ route('report.create') }}" target="_blank" class="button button-danger">
        <x-heroicon-o-bug-ant class="h-4 w-4" />
        <span class="text-sm">Nahlásit chybu</span>
    </a>
@endif
