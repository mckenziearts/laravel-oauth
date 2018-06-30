<?php

namespace Mckenziearts\LaravelOAuth\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSocialite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelsocialite';
    }
}
