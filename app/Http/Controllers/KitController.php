<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Support\SeoSupport;
use Illuminate\Http\Request;

class KitController extends Controller
{

    /**
     * Check if the kit can be edited.
     * The kit can be edited if all sheets are empty (examples have no answers).
     */

    private function canEdit($kit)
    {
        $canEdit = true;
        foreach ($kit->sheets as $sheet) {
            if ($sheet->examples()->whereNotNull('answer')->exists()) {
                $canEdit = false;
                break;
            }
        }

        return $canEdit;
    }

    /**
     * Create a new kit.
     */

    public function create()
    {
        $title = 'Nová sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = 'Vytvoření nové sady pracovních listů podle Vašich požadavků.';
        $pageDescription = SeoSupport::getMetaDescription($description);

        return view('kit.create', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'title' => $title,
            'description' => $description
        ]);
    }

    /**
     * Edit the kit.
     * The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function edit($id)
    {
        $kit = Kit::findOrFail($id);
        $canEdit = $this->canEdit($kit);

        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = $kit->description ? $kit->description : 'Editace sady pracovních listů';
        $pageDescription = SeoSupport::getMetaDescription($description);

        if ($canEdit) {
            return view('kit.edit', [
                'pageTitle' => $pageTitle,
                'pageDescription' => $pageDescription,
                'title' => $title,
                'description' => $description,
                'kit' => $kit
            ]);
        } else {
            return abort(404, 'Nelze upravit sadu pracovních listů, protože některé pracovní listy již byly vyplněny.');
        }
    }

    /**
     * Show the kit.
     */

    public function show($id)
    {
        $kit = Kit::findOrFail($id);
        $canEdit = $this->canEdit($kit);

        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = $kit->description ? $kit->description : 'Seznam pracovních listů v sadě.';
        $pageDescription = SeoSupport::getMetaDescription($description);

        return view('kit.show', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'title' => $title,
            'description' => $description,
            'kit'   => $kit,
            'canEdit' => $canEdit
        ]);
    }

    /**
     * Print the kit.
     * Print friendly version of the kit.
     */

    public function print($id)
    {
        $kit = Kit::findOrFail($id);

        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = SeoSupport::getMetaDescription('Tisková verze sady pracovních listů');

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

    /**
     * Remove the kit and all its sheets and examples.
     */

    public function remove($id)
    {
        $kit = Kit::findOrFail($id);

        // remove all examples and sheets
        foreach ($kit->sheets as $sheet) {
            foreach ($sheet->examples as $example) {
                $example->delete();
            }
            $sheet->delete();
        }

        // remove kit
        $kit->delete();

        // redirect to create new kit
        return redirect()->route('kit.create');
    }
}
