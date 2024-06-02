@extends('layouts.kit')

@section('announcement')
    @if ($kit->canEdit == false)
        <x-page.announcement>
            <strong class="font-semibold">Sadu již nelze editovat</strong>, <span class="text-white">byl vyplněný min. jeden příklad. <br />V případě potřeby si <a href="{{ route('kit.create') }}" target="_blank" class="underline hover:no-underline">vytvořte novou sadu</a>.</span>
        </x-page.announcement>
    @endif
@endsection

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>

        <x-slot:info>
            <x-page.kit-info :kit="$kit" />
        </x-slot:info>

        <x-slot:actions>
            <div class="flex gap-2">
                @if ($kit->canEdit == true)
                    <x-button icon="heroicon-o-adjustments-horizontal" primary="true" href="{{ route('kit.edit', ['kit' => $kit]) }}">
                        Upravit sadu
                    </x-button>
                @endif

                <x-button icon="heroicon-o-trash" danger="true" tooltip="Smazat sadu" x-on:click="modal='modal-kit-destroy'" />

                <x-button icon="heroicon-o-document-plus" tooltip="Vytvořit novou sadu" href="{{ route('kit.create') }}" target="_blank" />
                <x-button icon="heroicon-o-qr-code" tooltip="QR kódy" x-on:click="printThis('{{ route('kit.qr', ['kit' => $kit]) }}');" />
                <x-button icon="heroicon-o-table-cells" tooltip="Export do MS Excel" href="{{ route('kit.excel', ['kit' => $kit]) }}" />
                <x-button icon="heroicon-o-printer" tooltip="Tisková verze" x-on:click="printThis('{{ route('kit.print', ['kit' => $kit]) }}');" />
            </div>
        </x-slot:links>
    </x-page.heading>

    <livewire:sheets-list :kit="$kit" />
@endsection

@section('modals')
    <x-modals.kit.destroy :kit="$kit" />
@endsection
