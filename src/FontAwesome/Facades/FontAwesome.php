<?php

namespace MarvinLabs\Html\FontAwesome\Facades;

use Illuminate\Support\Facades\Facade;
use MarvinLabs\Html\FontAwesome\FontAwesome as FontAwesomeBuilder;

/**
 * Class FontAwesome
 * @package MarvinLabs\Html\FontAwesome\Facades
 *
 *          Facade for the HTML builder
 */
class FontAwesome extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @see \MarvinLabs\Html\FontAwesome\FontAwesome
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FontAwesomeBuilder::class;
    }
}
