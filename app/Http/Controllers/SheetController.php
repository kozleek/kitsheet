<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use App\Support\SeoSupport;
use Illuminate\Http\Request;
use App\Support\SheetSupport;

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
            'settingsExamplesSelectionOfResults' => $sheet->kit->settings_examples_selection_of_results,
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
        // check the sheet
        SheetSupport::check($sheet);
        // redirect to the sheet
        return redirect()->route('sheet.show', ['sheet' => $sheet]);
    }
}
