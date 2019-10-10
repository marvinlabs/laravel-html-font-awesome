<?php

namespace MarvinLabs\Html\FontAwesome;

use Illuminate\Support\ServiceProvider;

/**
 * Class FontAwesomeServiceProvider
 * @package MarvinLabs\Html\FontAwesome
 *
 *          The package's main service provider
 */
class FontAwesomeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel_html_font_awesome.php', 'laravel_html_font_awesome');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config' => config_path(),
            ], 'config');
        }
    }


    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(FontAwesome::class);
    }
}
