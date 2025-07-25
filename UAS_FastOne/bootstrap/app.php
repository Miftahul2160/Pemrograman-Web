<?php

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
        
        // Daftarkan alias middleware Anda di sini
        $middleware->alias([
            
            // PERBAIKAN: Path yang benar untuk middleware 'verified'
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            
            // Alias untuk 'admin' yang sudah kita buat
            'admin' => \App\Http\Middleware\AdminMiddleware::class,

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
