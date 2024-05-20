<footer class="mt-8 text-sm text-neutral-500 container mx-auto px-4 2xl:px-0 2xl:max-w-7xl">
    <div class="flex flex-col md:flex-row gap-4 md:justify-between md:items-center">
        <div class="space-y-1 text-xs">
            <p>KitSheet &copy; 2021 - {{ now()->year }} <a href="https://www.musiol.cz" target="_blank" class="hover:underline text-neutral-700">Tomáš Musiol</a> (tomas.musiol@gmail.com).</p>
            <p>Chcete dostávat novinky o nových funkcích a aktualizacích? <a href="https://nasetrida.substack.com/" target="_blank" class="hover:underline text-neutral-700">Přihlaste se k odběru novinek</a>.</p>
        </div>
        @if (Route::is('feedback.*') === false)
            <div>
                <a href="{{ route('feedback.create') }}" target="_blank" class="px-4 py-2 bg-orange-100 flex gap-2 items-center rounded-md cursor-pointer hover:bg-orange-500 text-orange-500 hover:text-white border border-orange-200 hover:border-orange-500">
                    <x-heroicon-o-pencil-square class="h-4 w-4" />
                    <span class="text-sm">Zpětná vazba</span>
                </a>
            </div>
        @endif
    </div>
</div>
