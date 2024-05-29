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

        $results = [];
        $results[] = $sheet->result;
        foreach ($sheet->examples as $example) {
            $results[] = $example->result;
        }
        // shuffle the results
        $results = collect($results)->shuffle();

        return view('sheet.show', [
            'title' => $title,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'sheet' => $sheet,
            'results' => $results,
        ]);
    }

    /**
     * Show the sheet by fingerprint.
     * @param string $fingerPrint
     *
     */
    public function showByFingerprint($fingerPrint)
    {
        $sheet = Sheet::where('fingerprint', $fingerPrint)->firstOrFail();
        return redirect()->route('sheet.show', ['sheet' => $sheet]);
    }

    /**
     * Check the sheet.
     */

    public function check(Sheet $sheet)
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

        // redirect to the sheet
        return redirect()->route('sheet.show', ['sheet' => $sheet]);
    }
}
