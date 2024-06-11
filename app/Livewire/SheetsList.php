<?php

namespace App\Livewire;

use Livewire\Component;
use App\Support\KitSupport;

class SheetsList extends Component
{
    public $kit;

    /**
     * Render the component.
     */

    public function render()
    {
        $sheets = $this->kit->sheets;
        // sort sheets by is_finished and percentage of correct answers
        $sheets = $sheets->sortByDesc(function ($sheet) {
            return [
                $sheet->is_finished,
                $sheet->percentage_of_correct_answers,
            ];
        });

        $examplesCount = KitSupport::getExamplesCount($this->kit);
        $correctAnswersCount = KitSupport::getCorrectAnswersCount($this->kit);
        $correctAnswersPercentage = KitSupport::getCorrectAnswersPercentage($this->kit);
        $wrongAnswersCount = KitSupport::getWrongAnswersCount($this->kit);
        $wrongAnswersPercentage = KitSupport::getWrongAnswersPercentage($this->kit);
        $emptyAnswersCount = KitSupport::getEmptyAnswersCount($this->kit);
        $emptyAnswersPercentage = KitSupport::getEmptyAnswersPercentage($this->kit);
        $finishedSheetsCount = KitSupport::getFinishedSheetsCount($this->kit);
        $finishedSheetsPercentage = KitSupport::getFinishedSheetsPercentage($this->kit);

        return view('livewire.sheets-list', [
            'sheets' => $sheets,
            'sheetsCount' => $sheets->count(),
            'examplesCount' => $examplesCount,
            'correctAnswersCount' => $correctAnswersCount,
            'correctAnswersPercentage' => $correctAnswersPercentage,
            'wrongAnswersCount' => $wrongAnswersCount,
            'wrongAnswersPercentage' => $wrongAnswersPercentage,
            'emptyAnswersCount' => $emptyAnswersCount,
            'emptyAnswersPercentage' => $emptyAnswersPercentage,
            'finishedSheetsCount' => $finishedSheetsCount,
            'finishedSheetsPercentage' => $finishedSheetsPercentage,
        ]);
    }
}
