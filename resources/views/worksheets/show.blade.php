@extends('layouts.app')

@section('title', $title)

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>

        <x-slot:info>
            <x-page.worksheet-info :kit="$worksheet->kit" />
        </x-slot:info>

        <x-slot:actions>
            @if (!$worksheet->is_finished)
                <livewire:send-for-checking :worksheet="$worksheet" />
            @endif
        </x-slot:links>
    </x-page.heading>

    @if ($worksheet->examples->count())
        <x-page.card>
            <div class="pt-8">
                <livewire:worksheet-edit :worksheet="$worksheet" />
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($worksheet->examples as $example)
                        <livewire:example :example="$example" key="$example->id" />
                    @endforeach
                </div>
            </div>
        </x-page.card>
    @endif
@endsection
