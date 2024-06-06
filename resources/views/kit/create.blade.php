@extends('layouts.kit')

@section('content')
    <x-page.content>
        <form action="{{ route('kit.store') }}" method="post">
            @csrf
            <x-form.kit-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-primary">
                    <x-heroicon-o-plus />
                    <span class="block md:hidden">Vytvořit sadu</span>
                    <span class="hidden md:block">Vytvořit novou sadu pracovních listů</span>
                </button>
            </div>
        </form>
    </x-page.content>
@endsection
