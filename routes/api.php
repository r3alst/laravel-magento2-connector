<?php

use Illuminate\Support\Facades\Route;
use R3alst\LaravelMagentoTwoConnector\Http\Controllers\OAuthController;

Route::group([
    "middleware" => "api",
    "prefix" => "api/magento2/v1"
], function() {
    Route::post("/oauth/callback", [OAuthController::class, "callback"]);
});