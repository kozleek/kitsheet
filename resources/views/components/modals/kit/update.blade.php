<x-modals.modal id="modal-kit-update">
    <x-slot:title>
        Uložit změny a vytvořit nové pracovní listy?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny existující pracovní listy a jejich související příklady budou smazány a vytvoří se nové pracovní listy s novými příklady dle zadání.</p>
        <p>Pro pracovní listy se vytvoří nové URL adresy - předchozí URL adresy již nebudou funkční!</p>
    </x-slot:text>

    <x-slot:actions>
        <x-button danger="true" wire:click="store">
            Ano
        </x-button>
    </x-slot:actions>
</x-modals.modal>
