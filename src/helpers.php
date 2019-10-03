<?php

use MarvinLabs\Html\FontAwesome\FontAwesome;

if (!function_exists('fa')) {

    /**
     * @param string $iconStyle
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fa($iconStyle = null)
    {
        return app(FontAwesome::class, ['iconStyle' => $iconStyle]);
    }
}

if (!function_exists('fas')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fas()
    {
        return app(FontAwesome::class, ['iconStyle' => 's']);
    }
}

if (!function_exists('far')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function far()
    {
        return app(FontAwesome::class, ['iconStyle' => 'r']);
    }
}

if (!function_exists('fal')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fal()
    {
        return app(FontAwesome::class, ['iconStyle' => 'l']);
    }
}

if (!function_exists('fad')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fad()
    {
        return app(FontAwesome::class, ['iconStyle' => 'd']);
    }
}

if (!function_exists('fab')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fab()
    {
        return app(FontAwesome::class, ['iconStyle' => 'b']);
    }
}
