<?php

namespace Kamaro\Ussd\Http\Controllers;

/**
 * Handles USSD actions
 */
class UssdController
{
    public function index()
    {
        return view('ussd::index');
    }
}
