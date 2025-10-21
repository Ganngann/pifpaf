<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ImageAnalysisServiceInterface;
use App\Services\GoogleVisionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImageAnalysisServiceInterface::class, GoogleVisionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
