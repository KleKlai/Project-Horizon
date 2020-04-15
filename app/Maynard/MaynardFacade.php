<?php

namespace App\Maynard;

use Illuminate\Support\Facades\Facade;

class MaynardFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'maynard';
    }
}
