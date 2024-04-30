@extends('layouts.app')

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>

    <livewire:kit-config />
@endsection
