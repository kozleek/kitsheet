<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Mail\ReportCreated;
use App\Support\SeoSupport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Create a new report.
     */

    public function create()
    {
        $title = 'Hlášení chyby';
        $description = 'Formulář pro hlášení chyby v aplikaci '. config('app.name');
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);

        return view('report.create', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
        ]);
    }

    /**
     * Store the new report.
     */

     public function store(ReportRequest $request)
     {
         // Validate the request with KitRequest
         $validateData = $request->validated();

        $validateData['file_name'] = null;
        $validateData['file_path'] = null;
        $validateData['file_type'] = null;

        // Zpracování souboru
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $originalName = $file->getClientOriginalName();
            $originalNameSlugify = time() . '_' . Str::slug($originalName, '_');
            $path = $file->storeAs('uploads', $originalNameSlugify, 'public');
            $type = $file->getClientMimeType();
            $validateData['file_name'] = $originalName;
            $validateData['file_path'] = $path;
            $validateData['file_type'] = $type;
        }

         $report = Report::create($validateData);

         Mail::to(config('mail.to.address'))->queue(
            new ReportCreated(
                $name = $validateData['name'],
                $mail = $validateData['mail'],
                $message = $validateData['message'],
                $techinfo = $validateData['techinfo'],
                $file_path = $validateData['file_path'],
                $file_name = $validateData['file_name'],
                $file_type = $validateData['file_type'],
            )
        );
         return redirect()->route('report.thankYou', ['id' => $report->id]);
     }

    /**
     * Show the thank you page.
     */

    public function thankYou()
    {
        $title = 'Děkuji za zpětnou vazbu';
        $description = 'Poděkování za zpětnou vazbu k aplikaci KitSheet.';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);

        $report = Report::findOrFail(request('id'));

        return view('report.thank-you', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'report' => $report,
        ]);
    }
}
