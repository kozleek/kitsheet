@extends('layouts.kit')

@section('content')
    <x-page.content>
        <form action="{{ route('kit.store') }}" method="post">
            @csrf
            <x-form.kit-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-check />
                    Vytvořit pracovní listy
                </button>
            </div>
        </form>
    </x-page.content>
@endsection
