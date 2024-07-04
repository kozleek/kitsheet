@props(['id' => ''])

<x-modals.default id="{{ $id }}">
    <x-slot:title>
        {{ __('modals.kit.update.title') }}
    </x-slot:title>

    <x-slot:text>
        {!! __('modals.kit.update.text') !!}
    </x-slot:text>

    <x-slot:actions>
        <button class="button button-danger" x-on:click="document.getElementById('form-kit-update').submit()">
            {{ __('modals.kit.update.submit') }}
        </button>
    </x-slot:actions>
</x-modals.default>
