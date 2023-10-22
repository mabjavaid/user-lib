<?php

namespace MaabJavaid\UserLib\Facades;

use Illuminate\Support\Facades\Facade;

class UserLib extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'user-lib';
    }
}
