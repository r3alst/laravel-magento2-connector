<?php
namespace R3alst\LaravelMagentoTwoConnector\Providers;

use Illuminate\Support\ServiceProvider;
use R3alst\LaravelMagentoTwoConnector\Console\Commands\GenerateMagentoModuleCommand;

class ConnectorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../database/migrations");
        $this->loadViewsFrom(__DIR__ . "/../../resources/views", "m2-connector");
        $this->commands([
            GenerateMagentoModuleCommand::class
        ]);
        $this->loadRoutesFrom(__DIR__ . "/../../routes/web.php");
        $this->loadRoutesFrom(__DIR__ . "/../../routes/api.php");
    }
}