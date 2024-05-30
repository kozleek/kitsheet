@if (Route::is('report.*') === false)
    <a href="{{ route('report.create') }}" target="_blank" class="px-4 py-2 bg-orange-100 flex gap-2 items-center rounded-md cursor-pointer hover:bg-orange-700 text-orange-500 hover:text-white border border-orange-200 hover:border-orange-700">
        <x-heroicon-o-bug-ant class="h-4 w-4" />
        <span class="text-sm">Nahlásit chybu</span>
    </a>
@endif
