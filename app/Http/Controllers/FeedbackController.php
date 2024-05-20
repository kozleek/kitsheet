<?php

namespace App\Http\Controllers;

use App\Support\SeoSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    /**
     * Create a new feedback.
     */

    public function create()
    {
        dd('create');

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
}
