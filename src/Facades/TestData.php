<?php

namespace Cms\Cmsblog\Facades;

use Illuminate\Support\Facades\Facade;

class TestData extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TestData';
    }
}
