<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'verify.api.key' => \App\Http\Middleware\VerifyApiKey::class,
            'set.locale' => \App\Http\Middleware\SetLocaleFromRequest::class,

        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
