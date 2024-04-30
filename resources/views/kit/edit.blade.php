@extends('layouts.kit')

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>

        <x-slot:info>
            <x-page.kit-info :kit="$kit" />
        </x-slot:info>

        <x-slot:actions>
            <x-button icon="heroicon-o-chevron-left" href="{{ route('kit.show', ['id' => $kit->id]) }}">
                Zpět
            </x-button>
        </x-slot:links>
    </x-page.heading>

    <livewire:kit-config :kit="$kit" />
@endsection
