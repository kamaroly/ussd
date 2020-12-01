<?php

namespace Kamaro\Ussd\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $guarded = [];

    protected $table = 'ussd_sessions';
}
