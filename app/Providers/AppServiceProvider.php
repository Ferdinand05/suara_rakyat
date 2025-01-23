<?php

namespace App\Providers;

use App\Models\Pengaduan;
use Inertia\Inertia;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'jumlahPengaduan' => Pengaduan::count()
        ]);
    }
}
