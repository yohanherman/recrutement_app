<?php

use App\Http\Middleware\DisplayByRole;
use App\Http\Middleware\JobSeekerOnly;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\Language;
use App\Http\Middleware\RecrutorOnly;
use Illuminate\Auth\Recaller;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->use([
            
            // Language::class,
            DisplayByRole::class,
            RecrutorOnly::class,
            JobSeekerOnly::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
