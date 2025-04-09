<?php

namespace App\Http;

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Daftar middleware global aplikasi.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware global lainnya
    ];

    /**
     * Daftar middleware yang ditugaskan ke grup route.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware web lainnya
        ],
        'api' => [
            // Middleware API lainnya
        ],
    ];

    /**
     * Daftar middleware route aplikasi.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'check.role' => \App\Http\Middleware\CheckRole::class,
    ];
}