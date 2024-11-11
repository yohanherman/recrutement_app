<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DisplayByRole
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

            if ($user->role == 'job-seeker' && !$request->routeIs('home.offers')) {
                return redirect()->route('home.offers');
            } elseif ($user->role == 'recrutor' && !$request->routeIs('recrutor.application')) {
                return redirect()->route('recrutor.application');
            }

            if ($user->role == 'recrutor' && $request->routeIs('home.offers')) {
                return redirect()->route('recrutor.application');
            }
        }

        return $next($request);
    }
}
