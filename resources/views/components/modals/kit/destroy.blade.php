@props(['id' => '', 'kit'])

<x-modals.default id="{{ $id }}">
    <x-slot:title>
        {{ __('modals.kit.destroy.title') }}
    </x-slot:title>

    <x-slot:text>
        {!! __('modals.kit.destroy.text') !!}
    </x-slot:text>

    <x-slot:actions>
        <form method="POST" action="{{ route('kit.destroy', ['kit' => $kit]) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="button button-danger">
                <x-heroicon-o-trash />
                {{ __('modals.kit.destroy.submit') }}
            </button>
        </form>
    </x-slot:actions>
</x-modals.default>
