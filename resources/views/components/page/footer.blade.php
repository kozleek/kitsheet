<footer class="mt-8 text-sm text-neutral-500 container mx-auto px-4 2xl:px-0 2xl:max-w-7xl">
    <div class="flex justify-between items-center">
        <div class="space-y-1 text-xs">
            <p>KitSheet &copy; 2021 - {{ now()->year }} <a href="https://www.musiol.cz" target="_blank" class="hover:underline text-neutral-700">Tomáš Musiol</a> (tomas.musiol@gmail.com).</p>
            <p>Chcete dostávat novinky o nových funkcích a aktualizacích? <a href="https://nasetrida.substack.com/" target="_blank" class="hover:underline text-neutral-700">Přihlaste se k odběru novinek</a>.</p>
        </div>
        <div class="">
            <x-feedback.handler />
        </div>
    </div>
</div>
