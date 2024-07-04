<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Mail\ReportCreated;
use App\Support\SeoSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ReportRequest;

class ReportController extends Controller
{
    /**
     * Create a new report.
     */

    public function create()
    {
        $title = __('report.header.title');
        $description = __('report.header.description'). ' ' . config('app.name');
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);
        $disableEdit = false;

        return view('report.create', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'disableEdit' => $disableEdit,
        ]);
    }

    /**
     * Store the new report.
     */

     public function store(ReportRequest $request)
     {
         // Validate the request with KitRequest
         $validateData = $request->validated();
         $report = Report::create($validateData);

         Mail::to(config('mail.to.address'))->queue(
            new ReportCreated(
                $name = $validateData['name'],
                $mail = $validateData['mail'],
                $message = $validateData['message'],
                $techinfo = $validateData['techinfo']
            )
        );
         return redirect()->route('report.thankYou', ['id' => $report->id]);
     }

    /**
     * Show the thank you page.
     */

    public function thankYou()
    {
        $title = __('report.thank_you.title');
        $description = __('report.thank_you.description');
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);
        $disableEdit = false;

        $report = Report::findOrFail(request('id'));

        return view('report.thank-you', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'report' => $report,
            'disableEdit' => $disableEdit,
        ]);
    }
}
