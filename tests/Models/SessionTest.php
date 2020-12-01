<?php

namespace Kamaro\Ussd\Tests;

use Kamaro\Ussd\Models\Menu;
use Kamaro\Ussd\Models\Session;

class SessionTest extends TestCase
{
	/** @test */
	public function it_should_record_ussd_session()
	{
	 	Session::create([
			'msisdn'         => '250722123127',
			'session'        => time(),
			'input'          => '780',
			'lang'           => 'en',
			'slug'           => 'home',
			'served_options' =>  json_encode([]),
			'freeflow'       => 'FB',
			'parent_id'      => 0,
			'menu_id'        => 1,
	 	]);

	 	$this->assertDatabaseCount('ussd_sessions', 1);
	}

	// /** @test */
	public function it_should_accept_session_for_existing_menu_only()
	{
	
	}
}