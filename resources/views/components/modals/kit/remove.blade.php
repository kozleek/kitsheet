@props(['kit'])

<x-modals.modal id="modal-kit-remove">
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

            <button type="submit" class="inline-flex items-center rounded-md text-base font-semibold shadow-sm gap-3 focus:outline-none cursor-pointer transition duration-200 ease-in-out border border-white/50 text-white bg-red-500 hover:bg-red-600 px-6 py-2">
                Ano
            </button>
        </form>
    </x-slot:actions>


    </form>
</x-modals.modal>
