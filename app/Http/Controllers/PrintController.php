<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Support\SeoSupport;
use Illuminate\Http\Request;

class PrintController extends Controller
{

    /**
     * Print the kit.
     * Print friendly version of the kit.
     */

    public function __invoke(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = $kit->description ? $kit->description : 'Tisková verze sady pracovních listů';
        $pageDescription = SeoSupport::getMetaInfo($kit);

        $results = [];

        $index = 0;
        foreach ($kit->sheets as $sheet) {
            $results[$index][] = $sheet->result;
            foreach ($sheet->examples as $example) {
                $results[$index][] = $example->result;
            }
            $results[$index] = collect($results[$index])->shuffle();
            $index++;
        }

        return view('kit.print', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'title' => $title,
            'description' => $description,
            'kit'   => $kit,
            'results' => $results
        ]);
    }
}
