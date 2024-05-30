@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('report.store') }}" method="post" multipart enctype="multipart/form-data">
            @csrf
            <x-form.report-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-danger">
                    <x-heroicon-o-bug-ant />
                    Nahlásit chybu
                </button>
                <a href="/" class="text-sm text-gray-400 underline hover:text-gray-600 hover:no-underline cursor-pointer">Zrušit</a>
            </div>
        </form>
    </x-page.card>

@endsection
