@props(['id' => '', 'sheet'])

<x-modals.default id="{{ $id }}">
    <x-slot:text>
        <x-sheet.info :sheet="$sheet" />
    </x-slot:text>
</x-modals.default>
