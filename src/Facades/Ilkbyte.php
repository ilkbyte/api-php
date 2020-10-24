<?php

namespace Netinternet\Ilkbyte\Facades;

use Illuminate\Support\Facades\Facade;

class Ilkbyte extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ilkbyte';
    }
}