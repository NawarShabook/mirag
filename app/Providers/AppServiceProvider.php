<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        Blade::if('isAdmin', function () {
            return auth()->check() && auth()->user()->role;
        });

        // Share data only with views using 'layouts.footer'
        View::composer('layouts.footer', function ($view) {
            $settings_info = config('global_data.settings_info');
            $settings = \App\Models\Setting::all();
            foreach ($settings as $setting){
                $settings_info[$setting->key] = $setting->value;
            }
            $view->with('settings_info', $settings_info);
        });
    }
}
