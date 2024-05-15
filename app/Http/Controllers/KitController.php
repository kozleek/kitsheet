<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Support\SeoSupport;
use Illuminate\Http\Request;

class KitController extends Controller
{

    /**
     * Create a new kit.
     */

    public function create()
    {
        $title = config('kitsheet.name');
        $pageTitle = SeoSupport::getPageTitle();
        $description = config('kitsheet.description');
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

    public function edit(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = $kit->description ? $kit->description : 'Editace sady pracovních listů';
        $pageDescription = SeoSupport::getMetaInfo($kit);

        if ($kit->canEdit) {
            return view('kit.edit', [
                'pageTitle' => $pageTitle,
                'pageDescription' => $pageDescription,
                'title' => $title,
                'description' => $description,
                'kit' => $kit
            ]);
        } else {
            return redirect()->route('kit.show', ['kit' => $kit]);
        }
    }

    /**
     * Show the kit.
     */

    public function show(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $description = $kit->description ? $kit->description : 'Seznam pracovních listů v sadě.';
        $pageDescription = SeoSupport::getMetaInfo($kit);

        return view('kit.show', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'title' => $title,
            'description' => $description,
            'kit'   => $kit,
        ]);
    }

    /**
     * Remove the kit and all its sheets and examples.
     */

    public function destroy(Kit $kit)
    {
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
