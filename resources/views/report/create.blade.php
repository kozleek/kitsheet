@extends('layouts.kit')

@section('content')
    <x-page.card>
        <form action="{{ route('report.store') }}" method="post">
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
