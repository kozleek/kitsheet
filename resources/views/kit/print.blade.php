@extends('layouts.print')

@section('content')
    <div class="print-page">
        <div class="mb-8">
            <h2 class="font-bold text-2xl">{{ $title }}</h2>
            <p class="text-base mt-2 text-neutral-500">{{ $description }}</p>

            <div class="text-black">
                <x-info.kit :kit="$kit" :settings="$settings" />
            </div>
        </div>

        <div class="mb-8">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="w-1/4 border border-neutral-200 p-2 bg-neutral-100 text-left">
                            {{ __('print.table.index') }}
                        </th>
                        <th class="w-2/4 border border-neutral-200 p-2 bg-neutral-100 text-left">
                            {{ __('print.table.title') }}
                        </th>
                        <th class="w-1/4 border border-neutral-200 p-2 bg-neutral-100 text-left">
                            {{ __('print.table.result') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kit->sheets as $sheet)
                        <tr>
                            <td class="border border-neutral-200 p-2 text-left">{{ $sheet->code }}</td>
                            <td class="border border-neutral-200 p-2 text-left">{{ $sheet->name }}</td>
                            <td class="border border-neutral-200 p-2 text-left">{{ $sheet->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="space-y-4 mt-4 divide-y-2 divide-black print:divide-y-0">
        @foreach ($kit->sheets as $sheet)
            <div class="print-page">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="font-bold text-2xl">
                            {{ __('sheet.header.title')}} {{ $sheet->code }}
                        </h2>
                        <x-info.sheet :kit="$sheet->kit" />
                    </div>
                    <div class="min-w-[200px] border-b border-neutral-300 pb-2 text-center">
                        {{ $sheet->name }}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-xl font-bold">
                            {{ __('print.examples') }}
                        </h3>
                        <div class="grid grid-cols-1 gap-4 mt-8">
                            @foreach ($sheet->examples as $example)
                                <div class="text-base font-sometype">{{ $example->specification_formatted}} = </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold">
                            {{ __('print.possible_results') }}
                        </h3>
                        <p class="text-base mt-2 text-neutral-500">
                            {{ __('print.possible_results_description') }}
                        </p>
                        <div class="grid grid-cols-4 gap-4 mt-8">
                            @foreach ($results[$loop->index] as $result)
                                <div class="border border-neutral-300 p-2 text-base font-sometype">{{ $result }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="print-page-break"></div>
            </div>
        @endforeach
    </div>
@endsection
