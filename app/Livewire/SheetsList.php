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
            'sheets' => $this->kit->sheets,
            'sheetsCount' => $this->kit->sheets->count(),
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
