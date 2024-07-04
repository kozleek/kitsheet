@props(['id' => '', 'sheet'])

<x-modals.default id="{{ $id }}">
    <x-slot:text>
        <x-sheet.info :sheet="$sheet" />
        <div
            class="bg-rose-600 size-6 flex justify-center items-center rounded-md text-white absolute -top-5 -right-2 shadow-sm cursor-pointer"
            x-on:click="modal=null"
            data-tippy-content="{{ __('app.cancel') }}"
        >
            <x-heroicon-o-x-mark class="!w-4 !h-4" />
        </div>
    </x-slot:text>
</x-modals.default>
