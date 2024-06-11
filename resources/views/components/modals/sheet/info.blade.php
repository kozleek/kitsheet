@props(['sheet'])

<x-modals.default id="modal-sheet-check">
    <x-slot:title>
        Zkontroloval/a si všechny výsledky?
    </x-slot:title>

    <x-slot:text>
        <p>Pracovní list bude odeslán učiteli k vyhodnocení. Po odeslání už nebude možné ho upravit.</p>
    </x-slot:text>

    <x-slot:actions>
        <button x-on:click="" class="button button-danger">
            <x-heroicon-o-check />
            Odeslat ke kontrole
        </button>
    </x-slot:actions>
</x-modals.default>
