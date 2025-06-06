<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     * 
     * It is also set as the URL generator's root namespace.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        // Route web utama
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Route API (kalau ada)
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // ✅ Route untuk admin (dengan prefix "admin")
        // Route::middleware(['web'])
        //     ->prefix('admin')
        //     ->name('admin.')
            // ->group(base_path('routes/admin.php'));
    }
}
