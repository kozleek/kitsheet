@props(['sheet'])

<x-modals.modal id="modal-sheet-check">
    <x-slot:title>
        Odeslat ke kontrole?
    </x-slot:title>

    <x-slot:text>
        <p>Všechny příklady se uloží, pošlou se ke kontrole a nebude již možné pokračovat v úpravách pracovního listu.</p>
        <p>Ihned po odeslání uvidíte vyhodnocení pracovního listu.</p>
    </x-slot:text>

    <x-slot:actions>
        <form action="{{ route('sheet.check', ['sheet' => $sheet]) }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center rounded-md text-base font-semibold shadow-sm gap-3 focus:outline-none cursor-pointer transition duration-200 ease-in-out border border-white/50 text-white bg-red-500 hover:bg-red-600 px-6 py-2">
                Souhlasím
            </button>
        </form>
    </x-slot:actions>
</x-modals.modal>
