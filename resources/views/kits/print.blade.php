@extends('layouts.print')

@section('title', $kit->title)

@section('content')
    <div class="print-page">
        <div class="mb-8">
            <h2 class="font-bold text-2xl">{{ $kit->title }}</h2>
            <p class="text-base mt-2 text-neutral-500">{{ $kit->description }}</p>

            <x-page.kit-info :kit="$kit" />
        </div>

        <div class="mb-8">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="w-1/4 border border-neutral-200 p-2 bg-neutral-100 text-left">Číslo</th>
                        <th class="w-2/4 border border-neutral-200 p-2 bg-neutral-100 text-left">Název (např. Jméno)</th>
                        <th class="w-1/4 border border-neutral-200 p-2 bg-neutral-100 text-left">Výsledek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kit->worksheets as $worksheet)
                        <tr>
                            <td class="border border-neutral-200 p-2 text-left">{{ $worksheet->code }}</td>
                            <td class="border border-neutral-200 p-2 text-left">{{ $worksheet->name }}</td>
                            <td class="border border-neutral-200 p-2 text-left">{{ $worksheet->result }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="space-y-4 mt-4 divide-y-2 divide-black print:divide-y-0">
        @foreach ($kit->worksheets as $worksheet)
            <div class="print-page">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="font-bold text-2xl">Pracovní list č. {{ $worksheet->code }}</h2>
                        <x-page.worksheet-info :kit="$worksheet->kit" />
                    </div>
                    <div class="min-w-[200px] border-b border-neutral-300 pb-2 text-center">
                        {{ $worksheet->name }}
                    </div>
                </div>
                <div class="space-y-12">
                    <div>
                        <h3 class="text-xl font-bold">Příklady</h3>
                        <div class="grid gap-4 mt-8 {{ $worksheet->kit->count_numbers > 2 ? 'grid-cols-3' : 'grid-cols-4' }}">
                            @foreach ($worksheet->examples as $example)
                                <div class="text-lg font-sometype">{{ $example->specification_formatted}} = </div>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold">Možné výsledky</h3>
                        <p class="text-base mt-2 text-neutral-500">Správné výsledky škrtněte a poslední zbývající číslo zakroužkujte</p>
                        <div class="grid grid-cols-7 gap-4 mt-8">
                            @foreach ($results[$loop->index] as $result)
                                <div class="border border-neutral-300 p-2 text-lg font-sometype">{{ $result }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="print-page-break"></div>
            </div>
        @endforeach
    </div>
@endsection
