@extends('layouts.app')

@section('title', $title)
@section('description', $description)

@section('announcement')
    @if (!$canEdit)
        <x-page.announcement>
            <strong class="font-semibold">Sadu již nelze editovat</strong>, <span class="text-white">byl vyplněný min. jeden příklad. <br />V případě potřeby si <a href="{{ route('kit.create') }}" target="_blank" class="underline hover:no-underline">vytvořte novou sadu</a>.</span>
        </x-page.announcement>
    @endif
@endsection

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $kit->title }}</x-slot:title>
        <x-slot:description>{{ $kit->description }}</x-slot:description>

        <x-slot:info>
            <x-page.kit-info :kit="$kit" />
        </x-slot:info>

        <x-slot:actions>
            <div class="flex gap-2">
                @if ($canEdit)
                    <x-button icon="heroicon-o-adjustments-horizontal" tooltip="Upravit sadu" href="{{ route('kit.edit', ['id' => $kit->id]) }}" />
                @endif

                <x-button icon="heroicon-o-link" tooltip="Zkopírovat odkaz na sadu" data-clipboard-text="{{ Request::url() }}" />
                <x-button icon="heroicon-o-printer" tooltip="Tisková verze" x-on:click="printThis('{{ route('kit.print', ['id' => $kit->id]) }}');" />
                <x-button icon="heroicon-o-trash" danger="true" tooltip="Smazat sadu" x-on:click="modal='remove'" />
            </div>
            <x-button icon="heroicon-o-plus" primary="true" href="{{ route('kit.create') }}" target="_blank">
                Vytvořit novou sadu
            </x-button>
        </x-slot:links>
    </x-page.heading>

    <livewire:kit-worksheets :kit="$kit" />
@endsection

@section('modals')
    <x-modals.remove :kit="$kit" />
@endsection
