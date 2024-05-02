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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:pt-8">
                @foreach ($sheet->examples as $example)
                    <livewire:example :example="$example" key="$example->id" />
                @endforeach
            </div>

            @if ($sheet->is_finished == false)
                <div class="mt-8">
                    <livewire:send-for-checking :sheet="$sheet" />
                </div>
            @endif
        </x-page.card>
    @endif
@endsection
