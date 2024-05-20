@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>
@endsection
