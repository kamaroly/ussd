<?php

namespace Kamaro\Ussd\Commands;

use Illuminate\Console\Command;

class UssdCommand extends Command
{
    public $signature = 'ussd';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
