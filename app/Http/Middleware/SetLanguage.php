<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, ['cs', 'en', 'de'])) { // Přidejte všechny podporované jazyky
                App::setLocale($lang);
                session(['lang' => $lang]);
            }
        } elseif (session('lang')) {
            App::setLocale(session('lang'));
        }
        else {
            App::setLocale('cs');
        }

        return $next($request);
    }
}
