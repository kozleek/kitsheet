<?php

namespace App\Observers;

use App\Support\RandomSupport;

class WorksheetObserver
{

    function creating($worksheet)
    {
        // generate a random placeholder name for the worksheet
        // $worksheet->name = RandomSupport::getRandomPlaceholderName();
    }
}
