<footer class="mt-8 text-sm text-neutral-400 container mx-auto px-4 2xl:px-0 2xl:max-w-7xl">
    <div class="space-y-1 text-xs">
        <p>KitSheet &copy; 2021 - {{ now()->year }} <a href="https://www.musiol.cz" target="_blank" class="hover:underline text-neutral-100">Tomáš Musiol</a> (tomas.musiol@gmail.com).</p>
        <p>Chcete dostávat novinky o nových funkcích a aktualizacích? <a href="https://nasetrida.substack.com/" target="_blank" class="hover:underline text-neutral-100">Přihlaste se k odběru novinek e-mailem</a>.</p>
        <p>Budete-li mít jakýkoliv dotaz, nápad na vylepšení nebo narazíte-li na chybu, napište do naši <a href="https://www.facebook.com/groups/kitsheet" target="_blank" class="hover:underline text-neutral-100">FB skupiny</a>.</p>
    </div>
    <div class="mt-4">
        <x-report.handler />
    </div>
</div>
