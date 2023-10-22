<?php

namespace MaabJavaid\UserLib\Facades;

use Illuminate\Support\Facades\Facade;

class ReqresClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'reqresClient';
    }
}
