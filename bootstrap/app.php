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
        
        // 1. Kecualikan rute API dari pengecekan CSRF (Sangat Penting untuk Integrasi)
        $middleware->validateCsrfTokens(except: [
            'api/*', 
        ]);

        // 2. Aktifkan dukungan API agar bisa diakses dari domain frontend (Live Server/Browser)
        $middleware->statefulApi();

        // 3. Daftar Alias Middleware yang sudah kamu buat
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
            'guru' => \App\Http\Middleware\IsGuru::class,
            'jwt.verify' => \App\Http\Middleware\JwtMiddleware::class, 
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();