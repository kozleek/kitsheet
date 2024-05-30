@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-page.heading>

    <x-page.card>
        <div class="space-y-2">
            <p>Děkuji za nahlášení chyby k aplikaci <a href="/" class="underline text-neutral-700">{{ config('app.name') }}</a>. Budu se snažit ji co nejdříve opravit.</p>
            <p>Níže je shrnutí Vašeho hlášení:</p>
        </div>
        @if($report->message)
            <div class="my-8 p-4 bg-neutral-100 rounded-md">
                <h2 class="text-lg font-semibold mb-2">{{ $report->name }} napsal/a:</h2>
                <p>{{ $report->message }}</p>
            </div>

            @if($report->techinfo)
                <div class="mb-8 p-4 bg-neutral-100 rounded-md">
                    <h2 class="text-lg font-semibold mb-2">Technické informace:</h2>
                    <pre class="text-sm">{{ $report->techinfo }}</pre>
                </div>
            @endif
        @endif

        <x-button icon="heroicon-o-chevron-left" href="{{ route('kit.create') }}">
            Zpět na hlavní stránku
        </x-button>
    </x-page.card>
@endsection
