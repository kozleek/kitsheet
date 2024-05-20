<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Mail\FeedbackCreated;
use App\Support\SeoSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Create a new feedback.
     */

    public function create()
    {
        $title = 'Zpětná vazba';
        $description = 'Zpětná vazba k aplikaci KitSheet.';
        $pageTitle = SeoSupport::getPageTitle($title);
        $pageDescription = SeoSupport::getMetaDescription($description);

        return view('feedback.create', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
        ]);
    }

    /**
     * Store the new feedback.
     */

     public function store(FeedbackRequest $request)
     {
         // Validate the request with KitRequest
         $validateData = $request->validated();
         $feedback = Feedback::create($validateData);

         Mail::to(config('mail.to.address'))->queue(new FeedbackCreated($name = $validateData['name'], $mail = $validateData['mail'], $message = $validateData['message']));
         return redirect()->route('feedback.thankYou', ['id' => $feedback->id]);
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

        $feedback = Feedback::findOrFail(request('id'));

        return view('feedback.thank-you', [
            'title' => $title,
            'description' => $description,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'feedback' => $feedback,
        ]);
    }
}
