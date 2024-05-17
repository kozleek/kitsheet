@extends('layouts.kit')

@section('content')
    <x-page.heading>
        <x-slot:title>{{ $title }}</x-slot:title>
        <x-slot:description>{{ $description }}</x-slot:description>
    </x-page.heading>

    <x-page.card>
        <form action="{{ route('kit.store') }}" method="post">
            @csrf
            <x-form.kit-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-plus class="h-5 w-5" />
                    <span class="block md:hidden">Vytvořit sadu</span>
                    <span class="hidden md:block">Vytvořit novou sadu pracovních listů</span>
                </button>
            </div>
        </form>
    </x-page.card>
@endsection
