<?php

namespace Kamaro\Ussd\Tests;

use Illuminate\Support\Facades\Route;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_should_be_successful_when_you_visit_the_new_url()
    {
        Route::ussd('kamaro');
        $this->get('kamaro')->assertSee('USSD ')->assertOk();
    }
}
