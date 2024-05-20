@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-page.heading>

    <x-page.card>
        <div class="space-y-2">
            <p>Děkuji za zpětnou vazbu k aplikaci {{ config('app.name') }}. Budu se snažit ji co nejdříve zpracovat.</p>
            <p>S pozdravem Tomáš Musiol</p>
        </div>
        @if($feedback->message)
            <div class="mt-8 p-4 bg-neutral-100 rounded-md">
                <h2 class="text-lg font-semibold mb-2">{{ $feedback->name }} napsal/a:</h2>
                <p>{{ $feedback->message }}</p>
            </div>
        @endif
    </x-page.card>
@endsection
