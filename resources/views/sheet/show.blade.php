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
                    <livewire:example :example="$example" :results="$results" key="$example->id" />
                @endforeach
            </div>

            @if ($sheet->is_finished == false)
                <div class="mt-8">
                    <form action="{{ route('sheet.check', ['sheet' => $sheet]) }}" method="POST" id="form-sheet-check">
                        @csrf
                        <a href="#" class="button button-primary" x-on:click="modal='modal-sheet-check'">
                            <x-heroicon-o-check />
                            <span class="block md:hidden">Odeslat ke kontrole</span>
                            <span class="hidden md:block">Odeslat všechny příklady ke kontrole</span>
                        </a>
                    </form>
                </div>
            @endif
        </x-page.card>
    @endif
@endsection

@section('modals')
    <x-modals.sheet.check :sheet="$sheet" />
@endsection
