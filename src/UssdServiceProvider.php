<?php

namespace Kamaro\Ussd;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Kamaro\Ussd\Commands\UssdCommand;

class UssdServiceProvider extends ServiceProvider
{
    public function boot()
    {
       $this->registerPublishables()
            ->registerRoutes()
            ->registerMigrations();

        if ($this->app->runningInConsole()) {
            $this->commands([
                UssdCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ussd');
    }

    public function registerPublishables() : self
    {
            $this->publishes([
                __DIR__ . '/../config/ussd.php' => config_path('ussd.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/ussd'),
            ], 'views');    

            return $this;
    }

    public function registerRoutes()
    {
        Route::macro('ussd', function(string $routeName){
            Route::prefix($routeName)->group(function(){
                Route::view('/', 'ussd::index');
            });
        });
        return $this;
    }

    public function registerMigrations() : self
    {
        $migrationFileName = 'create_ussd_table.php';
        if (! $this->migrationFileExists($migrationFileName)) {
            $this->publishes([
                __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
            ], 'migrations');
        }

        return $this;
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ussd.php', 'ussd');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
