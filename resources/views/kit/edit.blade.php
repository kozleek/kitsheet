@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>

        <x-slot:info>
            <x-page.kit-info :kit="$kit" />
        </x-slot:info>

        <x-slot:actions>
            <x-button icon="heroicon-o-chevron-left" href="{{ route('kit.show', ['kit' => $kit]) }}">
                Zpět
            </x-button>
        </x-slot:links>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('kit.update', ['kit' => $kit]) }}" method="post">
            @csrf
            @method('patch')
            <x-form.kit-items :kit="$kit" />

            <div class="text-sm mt-6 text-red-500">
                <p>Všechny existující pracovní listy a jejich související příklady se znovu vytvoří dle zadání.</p>
                <p>Pro pracovní listy se vytvoří nové URL adresy - předchozí URL adresy již nebudou funkční!</p>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-check class="h-5 w-5" />
                    Uložit sadu
                </button>
            </div>
        </form>
    </x-page.card>
@endsection
