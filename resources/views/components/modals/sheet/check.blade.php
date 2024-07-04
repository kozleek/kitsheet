@props(['id' => '', 'sheet'])

<x-modals.default id="{{ $id }}">
    <x-slot:title>
        {{ __('modals.sheet.check.title') }}
    </x-slot:title>

    <x-slot:text>
        {!! __('modals.sheet.check.text') !!}
    </x-slot:text>

    <x-slot:actions>
        <button x-on:click="document.getElementById('form-sheet-check').submit()" class="button button-danger">
            <x-heroicon-o-check />
            {{ __('modals.sheet.check.submit') }}
        </button>
    </x-slot:actions>
</x-modals.default>
