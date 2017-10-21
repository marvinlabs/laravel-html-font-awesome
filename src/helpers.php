<?php

use MarvinLabs\Html\FontAwesome\FontAwesome;

if ( !function_exists('fa'))
{

    /**
     * @return \MarvinLabs\Html\FontAwesome\FontAwesome
     */
    function fa()
    {
        return app(FontAwesome::class);
    }
}