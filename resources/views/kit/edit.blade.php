@extends('layouts.kit')

@section('actions')
    <x-action icon="heroicon-o-chevron-left" href="{{ route('kit.show', ['kit' => $kit]) }}">
        {{ __('kit.header.back_button') }}
    </x-action>
@endsection

@section('info')
    <x-info.kit :kit="$kit" :settings="$settings" />
@endsection

@section('content')
    <x-page.content>
        <form action="{{ route('kit.update', ['kit' => $kit]) }}" method="POST" id="form-kit-update">
            @csrf
            @method('patch')
            <x-form.kit-items :kit="$kit" />

            <div class="mt-6 flex items-center gap-4">
                <a href="#" class="button button-primary" x-on:click="modal='modal-kit-update'" >
                    <x-heroicon-o-check class="h-5 w-5" />
                    {{ __('kit.form.edit_button') }}
                </a>
            </div>
        </form>
    </x-page.content>
@endsection

@section('modals')
    <x-modals.kit.update id="modal-kit-update" />
@endsection
