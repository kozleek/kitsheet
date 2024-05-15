<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use App\Support\SeoSupport;
use Illuminate\Http\Request;

class SheetController extends Controller
{

    /**
     * Show the sheet.
     */

    public function show(Sheet $sheet)
    {
        $title = 'Pracovní list č. ' . $sheet->code;
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaInfo($sheet->kit, $showCountSheets = false);

        return view('sheet.show', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'title' => $title,
            'sheet' => $sheet
        ]);
    }
}
