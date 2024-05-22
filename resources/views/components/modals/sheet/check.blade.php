@props(['sheet'])

<x-modals.default id="modal-sheet-check">
    <x-slot:title>
        Odeslat ke kontrole?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny příklady se uloží, pošlou se ke kontrole a nebude již možné pokračovat v úpravách pracovního listu.</p>
        <p>Ihned po odeslání uvidíte vyhodnocení pracovního listu.</p>
    </x-slot:text>

    <x-slot:actions>
        <button x-on:click="document.getElementById('form-sheet-check').submit()" class="button button-danger">
            Souhlasím
        </button>
    </x-slot:actions>
</x-modals.default>
