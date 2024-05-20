@if (Route::is('feedback.*') === false)
    <a href="{{ route('feedback.create') }}" target="_blank" class="px-4 py-2 bg-orange-100 flex gap-2 items-center rounded-md cursor-pointer hover:bg-orange-700 text-orange-500 hover:text-white border border-orange-200 hover:border-orange-700">
        <x-heroicon-o-pencil-square class="h-4 w-4" />
        <span class="text-sm">Zpětná vazba</span>
    </a>
@endif
