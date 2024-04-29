<?php

namespace App\Observers;

use App\Support\RandomSupport;

class SheetObserver
{

    function creating($sheet)
    {
        // generate a random placeholder name for the sheet
        // $sheet->name = RandomSupport::getRandomPlaceholderName();
    }
}
