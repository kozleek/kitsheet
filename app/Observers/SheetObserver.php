<?php

namespace App\Observers;

use App\Models\Sheet;
use App\Support\RandomSupport;

class SheetObserver
{

    function created(Sheet $sheet)
    {
        // generate a random placeholder name for the sheet
        $sheet->fingerprint = RandomSupport::getRandomCode($sheet->id, 4);
        $sheet->save();
    }
}
