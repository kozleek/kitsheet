@extends('layouts.kit')

@section('announcement')

@endsection

@section('actions')
    @if ($kit->canEdit == true)
        <x-button icon="heroicon-o-adjustments-horizontal" primary="true" href="{{ route('kit.edit', ['kit' => $kit]) }}">
            <span class="hidden md:block">Upravit sadu</span>
        </x-button>
    @endif

    <x-button icon="heroicon-o-trash" danger="true" tooltip="Smazat sadu" x-on:click="modal='modal-kit-destroy'" />
    <x-button icon="heroicon-o-document-plus" tooltip="Vytvořit novou sadu" href="{{ route('kit.create') }}" target="_blank" />
    <x-button icon="heroicon-o-qr-code" tooltip="QR kódy" x-on:click="printThis('{{ route('kit.qr', ['kit' => $kit]) }}');" />
    <x-button icon="heroicon-o-table-cells" tooltip="Export do MS Excel" href="{{ route('kit.excel', ['kit' => $kit]) }}" />
    <x-button icon="heroicon-o-printer" tooltip="Tisková verze" x-on:click="printThis('{{ route('kit.print', ['kit' => $kit]) }}');" />
@endsection

@section('info')
    <x-page.kit-info :kit="$kit" />
@endsection

@section('content')
    <livewire:sheets-list :kit="$kit" />
@endsection

@section('modals')
    <x-modals.kit.destroy :kit="$kit" />
@endsection
