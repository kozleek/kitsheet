@extends('layouts.sheet')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>

        <x-slot:info>
            <x-page.sheet-info :kit="$sheet->kit" />
        </x-slot:info>
    </x-page.heading>

    @if ($sheet->examples->count())
        <x-page.card>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                @foreach ($sheet->examples as $example)
                    <livewire:example :example="$example" key="$example->id" />
                @endforeach
            </div>

            @if ($sheet->is_finished == false)
                <div class="mt-8">
                    <x-button x-on:click="modal='modal-sheet-check'" primary="true">
                        <x-heroicon-o-check />
                        <span class="block md:hidden">Odeslat ke kontrole</span>
                        <span class="hidden md:block">Odeslat všechny příklady ke kontrole</span>
                    </x-button>

                    <x-modals.sheet.check :sheet="$sheet" />
                </div>
            @endif
        </x-page.card>
    @endif
@endsection
