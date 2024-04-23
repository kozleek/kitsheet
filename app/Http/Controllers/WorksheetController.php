<?php

namespace App\Http\Controllers;

use App\Models\Worksheet;
use Illuminate\Http\Request;

class WorksheetController extends Controller
{

    /**
     * Show the worksheet.
     */

    public function show($id)
    {
        $worksheet = Worksheet::where('id', $id)->firstOrFail();
        $title = 'Pracovní list';
        return view('worksheets.show', [
            'title'     => $title,
            'worksheet' => $worksheet
        ]);
    }
}
