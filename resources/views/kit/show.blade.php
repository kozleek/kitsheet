@extends('layouts.kit')

@section('announcement')

@endsection

@section('actions')
    @if ($kit->canEdit == true)
        <x-action icon="heroicon-o-adjustments-horizontal" primary="true" href="{{ route('kit.edit', ['kit' => $kit]) }}">
            <span class="hidden md:block">
                {{ __('kit.show.toolbar.edit') }}
            </span>
        </x-action>
    @endif

    <x-action icon="heroicon-o-trash" danger="true" tooltip="{{ __('kit.show.toolbar.delete') }}" x-on:click="modal='modal-kit-destroy'" />
    <x-action icon="heroicon-o-document-plus" tooltip="{{ __('kit.show.toolbar.create') }}" href="{{ route('kit.create') }}" target="_blank" />
    <x-action icon="heroicon-o-qr-code" tooltip="{{ __('kit.show.toolbar.qr_codes') }}" x-on:click="printThis('{{ route('kit.qr', ['kit' => $kit]) }}');" />
    <x-action icon="heroicon-o-table-cells" tooltip="{{ __('kit.show.toolbar.export_excel') }}" href="{{ route('kit.excel', ['kit' => $kit]) }}" />
    <x-action icon="heroicon-o-printer" tooltip="{{ __('kit.show.toolbar.print') }}" x-on:click="printThis('{{ route('kit.print', ['kit' => $kit]) }}');" />
@endsection

@section('info')
    <x-info.kit :kit="$kit" :settings="$settings" />
@endsection

@section('content')
    <livewire:sheets-list :kit="$kit" />
@endsection

@section('modals')
    <x-modals.kit.destroy id="modal-kit-destroy" :kit="$kit" />

    @foreach ($kit->sheets as $sheet)
        <x-modals.sheet.info id="modal-sheet-info-{{ $sheet->id }}" :sheet="$sheet" />
    @endforeach
@endsection
