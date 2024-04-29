<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{

    /**
     * Show the sheet.
     */

    public function show($id)
    {
        $sheet = Sheet::where('id', $id)->firstOrFail();
        $title = 'Pracovní list';
        return view('sheet.show', [
            'title'     => $title,
            'sheet' => $sheet
        ]);
    }
}
