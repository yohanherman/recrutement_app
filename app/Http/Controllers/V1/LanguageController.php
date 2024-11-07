<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    public function selectLanguage(Request $request, String $lang)
    {
        // d'abord je verifie si la langue estvalide

        // if (in_array($lang, ['fr', 'en'])) {

        //     // Cookie::queue(Cookie::forever('app_locale', $lang));
        //     // Session::flash('message', "Langue changée en: " . strtoupper($lang));

        // }

        if (!empty($request->userLocale)) {
            Session::put('locale', $request->userLocale);
       }
        return redirect()->back();
    }
}
