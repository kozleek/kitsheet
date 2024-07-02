@props(['id' => '', 'kit'])

<x-modals.default id="{{ $id }}">
    <x-slot:title>
        Smazat tuto sadu pracovních listů?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny existující pracovní listy a jejich související příklady budou smazány.</p>
    </x-slot:text>

    <x-slot:actions>
        <form method="POST" action="{{ localizedRoute('kit.destroy', ['kit' => $kit]) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="button button-danger">
                <x-heroicon-o-trash />
                Smazat sadu
            </button>
        </form>
    </x-slot:actions>
</x-modals.default>
