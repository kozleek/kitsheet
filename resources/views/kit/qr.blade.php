@extends('layouts.print')

@section('content')
    <div class="print-page">
        <div class="mb-8">
            <h2 class="font-bold text-2xl">QR kódy pro sadu pracovních listů</h2>
            <p class="text-base mt-2 text-neutral-500">Sada pracovních listů obsahuje celkem {{ $kit->sheets->count() }} pracovních listů. <br />Každý pracovní list má svůj unikátní QR kód.</p>

            <x-info.kit :kit="$kit" :settings="$settings" />
        </div>

        <div class="mb-8">
            @foreach ($kit->sheets as $sheet)
                <x-sheet.info :sheet="$sheet" />
                @if (!$loop->last)
                    <div class="border-b border-neutral-300 border-dashed relative">
                        <div class="size-6 absolute right-4 -bottom-3.5">
                            <x-heroicon-o-scissors class="text-neutral-400" />
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
