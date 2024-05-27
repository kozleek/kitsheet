@extends('layouts.print')

@section('content')
    <div class="print-page">
        <div class="mb-8">
            <h2 class="font-bold text-2xl">QR kódy pro sadu pracovních listů</h2>
            <p class="text-base mt-2 text-neutral-500">Sada pracovních listů obsahuje celkem {{ $kit->sheets->count() }} pracovních listů. <br />Každý pracovní list má svůj unikátní QR kód.</p>

            <x-page.kit-info :kit="$kit" />
        </div>

        <div class="mb-8">
            @foreach ($kit->sheets as $sheet)
                <div class="border-b border-neutral-300 border-dashed py-4 first:border-t flex gap-8 relative">
                    <div>
                        {!! QrCode::size(150)->generate(route('sheet.show', $sheet)) !!}
                    </div>
                    <div class="flex flex-col justify-between">
                        <div>
                            <h2 class="font-bold text-xl">Pracovní list č. {{ $sheet->code }}</h2>
                            <x-page.kit-info :kit="$kit" />
                        </div>
                        <div>
                            <p class="text-xs text-neutral-400">{{ route('sheet.show', $sheet) }}</p>
                        </div>
                    </div>
                    <div class="size-6 absolute right-4 -bottom-3.5">
                        <x-heroicon-o-scissors class="text-neutral-400" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
