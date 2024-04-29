@extends('layouts.app')

@section('title', $title)

@section('content')
    <x-page.heading>
        <x-slot:title>Nová sada pracovních listů</x-slot:title>
    </x-page.heading>

    <livewire:kit-config />
@endsection
