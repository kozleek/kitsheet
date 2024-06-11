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
            @endforeach
        </div>
    </div>
@endsection
