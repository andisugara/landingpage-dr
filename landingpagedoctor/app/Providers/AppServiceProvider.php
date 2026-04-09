<?php

namespace App\Providers;

use App\Models\ContentBlock;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        View::composer('layouts.site', function ($view) {
            $navServices = collect();
            $blocks = collect();

            if (Schema::hasTable('services')) {
                $navServices = Service::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->get();
            }

            if (Schema::hasTable('content_blocks')) {
                $blocks = ContentBlock::query()->pluck('value', 'key');
            }

            $view->with([
                'navServices' => $navServices,
                'globalContent' => $blocks,
            ]);
        });

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
