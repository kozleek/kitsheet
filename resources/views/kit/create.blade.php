@extends('layouts.app')

@section('title', 'Nová sada pracovních listů')

@section('content')
    <x-page.heading>
        <x-slot:title>Nová sada pracovních listů</x-slot:title>
    </x-page.heading>

    <livewire:kit-config />
@endsection
