<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Mail\KitCreated;
use App\Mail\KitUpdated;
use App\Mail\KitDestroyed;
use App\Support\KitSupport;
use App\Support\SeoSupport;
use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use App\Http\Requests\KitRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class KitController extends Controller
{

    /**
     * Create a new kit.
     */

    public function create()
    {
        $title = config('kitsheet.name');
        $description = config('kitsheet.description');
        $pageTitle = SeoSupport::getPageTitle();
        $pageDescription = SeoSupport::getMetaDescription($description);

        return view('kit.create', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
        ]);
    }

    /**
     * Store the new kit.
     */

    public function store(KitRequest $request)
    {
        // Validate the request with KitRequest
        $validateData = $request->validated();
        // Store the kit to the database
        $kit = KitSupport::saveKitData($validateData);
        // Send email notification to the admin
        Mail::to(config('mail.to.address'))->queue(new KitCreated($kit));
        // Redirect to the kit show page
        return redirect()->route('kit.show', ['kit' => $kit]);
    }

    /**
     * Show the kit.
     */

    public function show(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $description = $kit->description ? $kit->description : 'Seznam pracovních listů v sadě.';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaInfo($kit);

        return view('kit.show', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'kit'   => $kit,
        ]);
    }

    /**
     * Edit the kit.
     * The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function edit(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $description = $kit->description ? $kit->description : 'Editace sady pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaInfo($kit);

        if ($kit->canEdit) {
            return view('kit.edit', [
                'title' => $title,
                'description' => $description,
                'pageTitle' => $pageTitle,
                'pageDescription' => $pageDescription,
                'kit' => $kit
            ]);
        } else {
            return redirect()->route('kit.show', ['kit' => $kit]);
        }
    }

    /**
     * Update the kit.
     */

    public function update(KitRequest $request, Kit $kit)
    {
        // Validate the request with KitRequest
        $validateData = $request->validated();
        // Update the kit to the database
        $kit = KitSupport::saveKitData($validateData, $kit);
        // Send email notification to the admin
        Mail::to(config('mail.to.address'))->queue(new KitUpdated($kit));
        // Redirect to the kit show page
        return redirect()->route('kit.show', ['kit' => $kit]);
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

    /**
     * Print the kit.
     * Print friendly version of the kit.
     */

    public function print(Kit $kit)
    {
        $title = $kit->title ? $kit->title : 'Sada pracovních listů';
        $description = $kit->description ? $kit->description : 'Tisková verze sady pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);

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
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'kit' => $kit,
            'results' => $results
        ]);
    }

    /**
     * Print the QR codes.
     * Print QR codes for the kit's sheets.
     */

     public function qr(Kit $kit)
     {
         $title = 'QR kódy pracovních listů';
         $description = 'Tisková verze QR kódů pracovních listů';
         $pageTitle = SeoSupport::getPageTitle($title);
         $pageDescription = SeoSupport::getMetaDescription($description);

         return view('kit.qr', [
             'title' => $title,
             'description' => $description,
             'pageTitle' => $pageTitle,
             'pageDescription' => $pageDescription,
             'kit' => $kit,
         ]);
     }

    /**
     * Export kit to Excel.
     * Export the kit to Excel file.
     */

     public function excel(Kit $kit)
     {
        $filename = 'kitsheet-vysledky-' . Carbon::now()->format('Y-m-d-H-i') . '.xlsx';
        return Excel::download(new ResultsExport($kit), $filename );
     }
}
