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
        return fa('s');
    }
}

if (!function_exists('far')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function far()
    {
        return fa('r');
    }
}

if (!function_exists('fal')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fal()
    {
        return fa('l');
    }
}

if (!function_exists('fad')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fad()
    {
        return fa('d');
    }
}

if (!function_exists('fab')) {

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fab()
    {
        return fa('b');
    }
}
