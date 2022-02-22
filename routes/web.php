<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use R3alst\LaravelMagentoTwoConnector\Facades\Magento2Helper;
use R3alst\LaravelMagentoTwoConnector\Http\Controllers\OAuthController;

Route::group([
    "guard" => "web",
    "middleware" => [
        "web"
    ],
    "prefix" => "magento2"
], function () {
    Route::get('login', [OAuthController::class, 'login'])->name('magento2-login');
    if(env("M2_GENERATOR", false)) {
        Route::get("generator", function() {
            return view("m2-connector::generator", [
                "resources" => Magento2Helper::getBasicAclList()
            ]);
        });
        Route::post("generator", function(Request $request) {
            $data = $request->only(["vendor_entry", "moduleName_entry", "integrationName_entry", "contactEmail_entry", "endpointUrl_entry", "identityUrl_entry", "resourcesList_entry"]);
            $zipFileName = Magento2Helper::createModuleFromOptions([
                "vendor" => $data["vendor_entry"],
                "moduleName" => $data["moduleName_entry"],
                "integrationName" => $data["integrationName_entry"],
                "contactEmail" => $data["contactEmail_entry"],
                "endpointUrl" => $data["endpointUrl_entry"],
                "identityUrl" => $data["identityUrl_entry"],
                "resourcesList" => $data["resourcesList_entry"]
            ]);
            return response()->download($zipFileName);
        });
    }
});