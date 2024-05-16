<x-modals.modal id="modal-sheet-check">
    <x-slot:title>
        Odeslat ke kontrole?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny příklady se uloží, pošlou se ke kontrole a nebude již možné pokračovat v úpravách pracovního listu.</p>
        <p>Ihned po odeslání uvidíte vyhodnocení pracovního listu.</p>
    </x-slot:text>

    <x-slot:actions>
        <x-button small="true" danger="true" wire:click="store">
            Souhlasím
        </x-button>
    </x-slot:actions>
</x-modals.modal>
