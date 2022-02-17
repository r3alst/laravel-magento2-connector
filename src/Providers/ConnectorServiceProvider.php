<?php
namespace R3alst\LaravelMagentoTwoConnector\Providers;

use Illuminate\Support\ServiceProvider;

class ConnectorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../database/migrations");
        $this->loadRoutesFrom(__DIR__ . "/../../routes/web.php");
        $this->loadRoutesFrom(__DIR__ . "/../../routes/api.php");
    }
}