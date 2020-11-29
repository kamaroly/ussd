<?php

namespace Kamaro\Ussd;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kamaro\Ussd\Ussd
 */
class UssdFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ussd';
    }
}
