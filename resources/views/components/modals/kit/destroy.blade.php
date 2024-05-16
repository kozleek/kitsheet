@props(['kit'])

<x-modals.default id="modal-kit-destroy">
    <x-slot:title>
        Smazat tuto sadu pracovních listů?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny existující pracovní listy a jejich související příklady budou smazány.</p>
    </x-slot:text>

    <x-slot:actions>
        <form method="POST" action="{{ route('kit.destroy', ['kit' => $kit]) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="button button-danger">
                Ano
            </button>
        </form>
    </x-slot:actions>


    </form>
</x-modals.default>
