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
        foreach ($sheet->examples as $example) {
            $example->answer = isset($example->answer) ? $example->answer : '?';
            $example->is_correct = $example->is_correct ? 1 : 0;
            $example->save();
        }

        // mark the sheet as finished
        $sheet->is_finished = true;
        // save the sheet
        $sheet->save();
    }

}
