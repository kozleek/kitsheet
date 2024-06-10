<?php

namespace App\Exports;

use App\Models\Kit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $kit;

    public function __construct($kit)
    {
        $this->kit = $kit;
    }

    public function headings(): array
    {
        return [
            'Číslo',
            'Jméno',
            'Správně',
            'Špatně',
            'Neodpovězeno',
            'URL',
        ];
    }

    public function collection()
    {

        $results = [];
        foreach ($this->kit->sheets()->finished()->get() as $sheet) {
        //foreach ($this->kit->sheets as $sheet) {
            $results[] = [
                'number' => 'Pracovní list č. ' . $sheet->code,
                'name' => '',
                'correct' => $sheet->correct_answers_counter ? $sheet->correct_answers_counter : '0',
                'wrong' => $sheet->wrong_answers_counter ? $sheet->wrong_answers_counter : '0',
                'empty' => $sheet->empty_answers_counter ? $sheet->empty_answers_counter : '0',
                'url' => route('sheet.show', ['sheet' => $sheet]),
            ];
        }

        return collect($results);
    }
}
