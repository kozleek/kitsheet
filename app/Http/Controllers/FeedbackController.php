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
}
