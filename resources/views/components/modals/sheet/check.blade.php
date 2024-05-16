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
        <form action="{{ route('sheet.check', ['sheet' => $sheet]) }}" method="POST">
            @csrf
            <button type="submit" class="button button-danger">
                Souhlasím
            </button>
        </form>
    </x-slot:actions>
</x-modals.default>
