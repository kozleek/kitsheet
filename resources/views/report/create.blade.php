@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('report.store') }}" method="post">
            @csrf
            <x-form.report-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-rocket-launch />
                    Nahlásit chybu
                </button>
            </div>
        </form>
    </x-page.card>

@endsection
