<?php
namespace Smartisan\Locally\Facades;

use Illuminate\Support\Facades\Facade;

class Locally extends Facade
{
    /**
     * Define Laravel Facade Accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'locally';
    }
}