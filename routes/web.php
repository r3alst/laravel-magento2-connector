<?php
use Illuminate\Support\Facades\Route;
use R3alst\LaravelMagentoTwoConnector\Http\Controllers\OAuthController;

Route::group([
    "guard" => "web",
    "middleware" => [
        "web"
    ],
    "prefix" => "magento2"
], function () {
    Route::get('login', [OAuthController::class, 'login'])->name('magento2-login');
});