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
        </x-slot:actions>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('kit.update', ['kit' => $kit]) }}" method="POST" id="form-kit-update">
            @csrf
            @method('patch')
            <x-form.kit-items :kit="$kit" />

            <div class="mt-6 flex items-center gap-4">
                <a href="#" class="button button-primary" x-on:click="modal='modal-kit-update'" >
                    <x-heroicon-o-check class="h-5 w-5" />
                    Uložit sadu
                </a>
            </div>
        </form>
    </x-page.card>
@endsection

@section('modals')
    <x-modals.kit.update />
@endsection
