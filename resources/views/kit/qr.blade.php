@extends('layouts.print')

@section('content')
    <div class="print-page">
        <div class="mb-8">
            <h2 class="font-bold text-2xl">{{ $title }}</h2>
            <p class="text-base mt-2 text-neutral-500">{{ $description }}</p>

            <x-info.kit :kit="$kit" :settings="$settings" />
        </div>

        <div class="mb-8">
            <div class="border-b border-neutral-300 border-dashed relative">
                <div class="size-6 absolute right-4 -bottom-3.5">
                    <x-heroicon-o-scissors class="text-neutral-400" />
                </div>
            </div>
            @foreach ($kit->sheets as $sheet)
                <x-sheet.info :sheet="$sheet" />
                <div class="border-b border-neutral-300 border-dashed relative">
                    <div class="size-6 absolute right-4 -bottom-3.5">
                        <x-heroicon-o-scissors class="text-neutral-400" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
