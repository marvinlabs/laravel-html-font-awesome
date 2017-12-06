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
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(FontAwesome::class);
    }
}