<?php

namespace Kamaro\Ussd\Tests;

class UssdControllerTest extends TestCase
{
    /** @test */
    public function it_should_show_ussd_index_page()
    {
        $this->get('kamaro')->assertSee('USSD ')->assertOk();
    }
}
