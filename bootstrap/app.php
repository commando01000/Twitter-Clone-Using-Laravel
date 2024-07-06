<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\Middleware\EnsureUserIsGuest;
use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //register middle ware SetLocale
        // $middleware->alias([SetLocale::class, 'SetLocale']);
        $middleware->append(SetLocale::class);
        $middleware->append(EnsureUserIsGuest::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
