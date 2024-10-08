<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kit;
use App\Mail\KitCreated;
use App\Mail\KitUpdated;
use App\Mail\KitDestroyed;
use App\Support\KitSupport;
use App\Support\SeoSupport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\KitRequest;

use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use function Spatie\LaravelPdf\Support\pdf;

class KitController extends Controller
{

    /**
     * Create a new kit.
     */

    public function create()
    {
        $title = config('app.name');
        $description = __('app.description');
        $pageTitle = SeoSupport::getPageTitle();
        $pageDescription = SeoSupport::getMetaDescription($description);
        $disableEdit = false;

        return view('kit.create', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'disableEdit' => $disableEdit,
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
        Mail::to('tomas.musiol@gmail.com')->queue(new KitCreated($kit));
        // Send email notification to the teacher
        ray($kit->teacher_email);
        if($kit->teacher_email) {
            Mail::to($kit->teacher_email)->queue(new KitCreated($kit));
        }
        // Redirect to the kit show page
        return redirect()->route('kit.show', ['kit' => $kit]);
    }

    /**
     * Show the kit.
     */

    public function show(Kit $kit)
    {
        $title = KitSupport::getKitName($kit);
        $description = $kit->description ? $kit->description : __('kit.header.description');
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaInfo($kit);
        $disableEdit = !$kit->canEdit;

        return view('kit.show', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'kit' => $kit,
            'disableEdit' => $disableEdit,
            'settings' => KitSupport::getSettingsNames($kit->settings_examples),
        ]);
    }

    /**
     * Edit the kit.
     * The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function edit(Kit $kit)
    {
        $title = KitSupport::getKitName($kit);
        $description = $kit->description ? $kit->description : 'Editace sady pracovních listů';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaInfo($kit);
        $disableEdit = !$kit->canEdit;

        if ($kit->canEdit) {
            return view('kit.edit', [
                'title' => $title,
                'description' => $description,
                'pageTitle' => $pageTitle,
                'pageDescription' => $pageDescription,
                'kit' => $kit,
                'disableEdit' => $disableEdit,
                'settings' => KitSupport::getSettingsNames($kit->settings_examples),
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
        // Send email notification to the teacher
        if($kit->teacher_email) {
            Mail::to($kit->teacher_email)->queue(new KitUpdated($kit));
        }
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
        $title = __('print.header.title');
        $description = $kit->description ? $kit->description : __('print.header.description');
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
            'results' => $results,
            'settings' => KitSupport::getSettingsNames($kit->settings_examples),
        ]);
    }

    /**
     * Print the QR codes.
     * Print QR codes for the kit's sheets.
     */

     public function qr(Kit $kit)
     {
         $title = __('qr.header.title');
         $description = __('qr.header.description');
         $pageTitle = SeoSupport::getPageTitle($title);
         $pageDescription = SeoSupport::getMetaDescription($description);

         return view('kit.qr', [
             'title' => $title,
             'description' => $description,
             'pageTitle' => $pageTitle,
             'pageDescription' => $pageDescription,
             'kit' => $kit,
             'settings' => KitSupport::getSettingsNames($kit->settings_examples),
         ]);
     }

    /**
     * Export kit to Excel.
     * Export the kit to Excel file.
     */

     public function excel(Kit $kit)
     {
        $filename = 'kitsheet-hodnoceni-' . Carbon::now()->format('j-n-Y') . '.xlsx';
        return Excel::download(new ResultsExport($kit), $filename );
     }

    /**
     * Export kit to PDF.
     * Export the kit to PDF file.
     */

    public function pdf(Kit $kit)
    {
        $filename = 'kitsheet-' . Str::slug($kit->title, '-') . '-' . Carbon::now()->format('j-n-Y') . '.pdf';

        $title = __('print.header.title');
        $description = $kit->description ? $kit->description : __('print.header.description');
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

        // return pdf()
        //     ->view('kit.print', [
        //         'title' => $title,
        //         'description' => $description,
        //         'pageTitle' => $pageTitle,
        //         'pageDescription' => $pageDescription,
        //         'kit' => $kit,
        //         'results' => $results,
        //         'settings' => KitSupport::getSettingsNames($kit->settings_examples),
        //     ])
        //     ->name($filename)
        //     ->margins("10", "10", "10", "10")
        //     ->download();

        $pdf = Pdf::loadView('kit.print', [
                'title' => $title,
                'description' => $description,
                'pageTitle' => $pageTitle,
                'pageDescription' => $pageDescription,
                'kit' => $kit,
                'results' => $results,
                'settings' => KitSupport::getSettingsNames($kit->settings_examples),
            ]);
        return $pdf->download($filename);
    }
}
