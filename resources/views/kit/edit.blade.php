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

    <form action="{{ route('kit.store') }}" method="post">
        @csrf
        @method('patch')
        <x-form.kit-items />

        <div class="mt-8 flex items-center gap-4">
            <button type="submit" class="button button-primary">
                <x-heroicon-o-check class="h-5 w-5" />
                Uložit sadu
            </button>
        </div>
    </form>
@endsection
