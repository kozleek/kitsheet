<?php

namespace App\Support;

use App\Models\Sheet;

class SheetSupport
{

    /**
     * Check the sheet
     * This method checks the sheet and marks it as finished
     */

    public static function check(Sheet $sheet)
    {
        // count examples
        $countExamples = $sheet->examples->count();
        $correctExamples = 0;

        foreach ($sheet->examples as $example) {
            ExampleSupport::saveAnswer($example, $example->answer);
        }

        // mark the sheet as finished
        $sheet->is_finished = true;
        // save the sheet
        $sheet->save();
    }

}
