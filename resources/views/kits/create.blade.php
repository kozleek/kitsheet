@extends('layouts.app')

@section('title', 'Nová sada pracovních listů')

@section('content')
    <x-page.heading>
        <x-slot:title>Vytvoření nové sady</x-slot:title>
        <x-slot:description>Vytvoření nové sady pracovních listů, podle vaších požadavků</x-slot:description>
    </x-page.heading>

    <livewire:kit-config />
@endsection
