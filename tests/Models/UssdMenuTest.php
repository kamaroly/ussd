<?php

namespace Kamaro\Ussd\Tests;

use Illuminate\Support\Facades\Route;
use Kamaro\Ussd\Models\UssdMenu;

class UssdMenuTest extends TestCase
{
    /** @test */
    public function it_should_record_ussd_menu()
    {
    	UssdMenu::create(['name' => 'Home', 'parent_id' => 0]);
    	$this->assertDatabaseCount('ussd_menus', 1);
    }

    /** @test */
    public function it_should_retrieve_parent_name()
    {
    	UssdMenu::create(['name' => 'Home', 'parent_id' => 0]);
    	$subMenu = UssdMenu::create(['name' => 'Sub-menu', 'parent_id' => 1]);

    	$this->assertEquals('Home', $subMenu->parent_name);
    }

    /**@test*/
    public function test_it_returns_root_when_menu_does_not_have_parent($value='')
    {
    	$menu = UssdMenu::create(['name' => 'Home', 'parent_id' => 0]);
    	$this->assertEquals('Root', $menu->parent_name);
    }
}