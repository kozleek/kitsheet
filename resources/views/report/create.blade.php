@extends('layouts.kit')

@section('actions')
    <x-action icon="heroicon-o-chevron-left" href="{{ route('kit.create') }}">
        {{ __('report.header.back_button') }}
    </x-action>
@endsection

@section('content')
    <x-page.content>
        <form action="{{ route('report.store') }}" method="post">
            @csrf
            <x-form.report-items />

            <div class="mt-8 flex items-center gap-4">
                <button type="submit" class="button button-danger">
                    <x-heroicon-o-bug-ant />
                    {{ __('report.form.save_button') }}
                </button>
                <a href="/" class="text-sm text-gray-400 underline hover:text-gray-600 hover:no-underline cursor-pointer">
                    {{ __('app.cancel')}}
                </a>
            </div>
        </form>
    </x-page.content>
@endsection
