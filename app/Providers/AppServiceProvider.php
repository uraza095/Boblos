<?php

namespace App\Providers;

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

    public function boot(): void
    {
        if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
            $settings = \App\Models\Setting::pluck('value', 'key')->all();
            view()->share('settings', $settings);
        }
        if (\Illuminate\Support\Facades\Schema::hasTable('page_sections')) {
            // Convert JSON/arrays of contents into accessible array format
            $sections = \App\Models\PageSection::all()->pluck('content', 'section_key')->all();
            view()->share('sections', $sections);
        }

        // Dynamically prefix storage paths with 'public/' when accessed from the live production domain
        \Illuminate\Support\Facades\Blade::precompiler(function ($value) {
            $value = preg_replace(
                "/asset\(\s*['\"]storage\/['\"]\s*\./",
                "asset((str_contains(request()->getHost(), 'fignolive.pk') ? 'public/storage/' : 'storage/') .",
                $value
            );
            return $value;
        });
    }
}
