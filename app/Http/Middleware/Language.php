<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $local = $request->cookie('app_locale', config('app.locale'));

        //     App::setLocale($local);
        //     dd($request->cookies->all(), 'je suis ici');
        //     logger("Langue définie: " . $local);

        if (Session::has('app_locale')) {
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
