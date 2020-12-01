<?php

namespace Kamaro\Ussd\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Kamaro\Ussd\UssdServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Kamaro\\Ussd\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
        /** Import route namespace for this package */
        Route::ussd('kamaro');
    }

    protected function getPackageProviders($app)
    {
        return [
            UssdServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        
        include_once __DIR__.'/../database/migrations/create_ussd_table.php.stub';
        (new \CreateUssdMenuTable())->up();
    }
}
