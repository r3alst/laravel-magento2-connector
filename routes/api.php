<?php

use Illuminate\Support\Facades\Route;
use R3alst\LaravelMagentoTwoConnector\Http\Controllers\OAuthController;
use R3alst\LaravelMagentoTwoConnector\Models\M2Store;
use R3alst\LaravelMagentoTwoConnector\Models\M2StoreWebhook;
use R3alst\LaravelMagentoTwoConnector\Requests\WebhookRequest;

Route::group([
    "middleware" => "api",
    "prefix" => "api/magento2/v1"
], function() {
    Route::post("/oauth/callback", [OAuthController::class, "callback"]);
    Route::post("/webhook", function(WebhookRequest $request) {
        $data = $request->only([
            "entity_type", "entity_id", "event_type", "consumer_key"
        ]);
        /** @var M2Store $m2Store */
        $m2Store = M2Store::query()->where("oauth_consumer_key", $data["consumer_key"])->first();
        $webhook = new M2StoreWebhook();
        $webhook->fill([
            "m2store_id" => $m2Store->id,
            "entity_type" => $data["entity_type"],
            "entity_id" => $data["entity_id"],
            "event_type" => $data["event_type"],
            "status" => M2StoreWebhook::STATUS_PENDING
        ]);
        $webhook->save();
    });
});