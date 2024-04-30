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
        $title = SeoSupport::getPageTitle('Nová sada pracovních listů');
        $description = SeoSupport::getMetaDescription();

        return view('kit.create', [
            'title' => $title,
            'description' => $description
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

    /**
     * Edit the kit.
     * The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function edit($id)
    {
        $kit = Kit::findOrFail($id);
        $canEdit = $this->canEdit($kit);

        $titleText = $kit->title ? $kit->title : 'Sada pracovních listů';
        $title = SeoSupport::getPageTitle($titleText);
        $description = SeoSupport::getMetaDescription('Editace sady pracovních listů');

        if ($canEdit) {
            return view('kit.edit', [
                'title' => $title,
                'description' => $description,
                'kit' => $kit
            ]);
        } else {
            return abort(404, 'Nelze upravit sadu pracovních listů, protože některé pracovní listy již byly vyplněny.');
        }
    }

    /**
     * Print the kit.
     * Print friendly version of the kit.
     */

    public function print($id)
    {
        $kit = Kit::findOrFail($id);

        $titleText = $kit->title ? $kit->title : 'Sada pracovních listů';
        $title = SeoSupport::getPageTitle($titleText);
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
            'title' => $title,
            'description' => $description,
            'kit'   => $kit,
            'results' => $results
        ]);
    }

    /**
     * Show the kit.
     */

    public function show($id)
    {
        $kit = Kit::findOrFail($id);
        $canEdit = $this->canEdit($kit);

        $titleText = $kit->title ? $kit->title : 'Sada pracovních listů';
        $title = SeoSupport::getPageTitle($titleText);
        $description = SeoSupport::getMetaDescription('Sada pracovních listů');

        return view('kit.show', [
            'title' => $title,
            'description' => $description,
            'kit'   => $kit,
            'canEdit' => $canEdit
        ]);
    }
}
