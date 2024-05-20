@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('feedback.store') }}" method="post">
            @csrf
            <x-form.feedback-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-rocket-launch />
                    Odeslat zpětnou vazbu
                </button>
            </div>
        </form>
    </x-page.card>

@endsection
