@props(['kit'])

<x-modals.modal id="remove">
    <x-slot:title>
        Smazat tuto sadu pracovních listů?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny existující pracovní listy a jejich související příklady budou smazány.</p>
    </x-slot:text>

    <x-slot:actions>
        <x-button small="true" danger="true" href="{{ route('kit.remove', ['kit' => $kit]) }}">
            Ano
        </x-button>
    </x-slot:actions>
</x-modals.modal>
