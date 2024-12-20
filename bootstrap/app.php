<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->priority([
        //     'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        //     'admin' => App\Http\Middleware\AdminMiddleware::class,
        //     'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        //     'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        //     'can' => \Illuminate\Auth\Middleware\Authorize::class,
        //     'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // ]);
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
