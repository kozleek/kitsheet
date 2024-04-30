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

    public function show($id)
    {
        $sheet = Sheet::where('id', $id)->firstOrFail();
        $title = SeoSupport::getPageTitle('Pracovní list č. ' . $sheet->code);
        return view('sheet.show', [
            'title'     => $title,
            'sheet' => $sheet
        ]);
    }
}
