<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RecrutorOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();

            // Si l'utilisateur n'est pas un recruteur, rediriger vers une autre page
            if ($user->role !== 'recrutor') {
                return redirect()->route('unauthorized.error'); // Ou une autre page de ton choix
            }
            // return redirect()->route('unauthorized.error');
        }

        return $next($request);
    }
}
