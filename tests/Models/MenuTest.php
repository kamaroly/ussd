<?php

namespace Kamaro\Ussd\Tests;

use Kamaro\Ussd\Models\Menu;

class MenuTest extends TestCase
{
    /** @test */
    public function it_should_record_ussd_menu()
    {
        Menu::create(['name' => 'Home', 'parent_id' => 0]);
        $this->assertDatabaseCount('ussd_menus', 1);
    }

    /** @test */
    public function it_should_retrieve_parent_name()
    {
        Menu::create(['name' => 'Home', 'parent_id' => 0]);
        $subMenu = Menu::create(['name' => 'Sub-menu', 'parent_id' => 1]);

        $this->assertEquals('Home', $subMenu->parent_name);
    }

    /**   @test */
    public function test_it_returns_root_when_menu_does_not_have_parent($value = '')
    {
        $menu = Menu::create(['name' => 'Home', 'parent_id' => 0]);
        $this->assertEquals('Root', $menu->parent_name);
    }

    /**   @test */
    public function it_should_retrieve_children()
    {
        $menu = Menu::create(['name' => 'Home', 'parent_id' => 0]);
        Menu::create(['name' => 'Sub-menu-1', 'parent_id' => 1]);
        Menu::create(['name' => 'Sub-menu-2', 'parent_id' => 1]);
        Menu::create(['name' => 'Sub-menu-3', 'parent_id' => 1]);

        $this->assertEquals(3, $menu->children->count());
    }

    /**   @test */
    public function it_should_retrieve_parent()
    {
        $menu = Menu::create(['name' => 'Home', 'parent_id' => 0]);
        Menu::create(['name' => 'Sub-menu-1', 'parent_id' => 1]);
        Menu::create(['name' => 'Sub-menu-2', 'parent_id' => 1]);
        $submenu = Menu::create(['name' => 'Sub-menu-3', 'parent_id' => 1]);

        $this->assertEquals(1, $submenu->parent->id);
    }
}
