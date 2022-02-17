<?php
namespace R3alst\LaravelMagentoTwoConnector\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use R3alst\LaravelMagentoTwoConnector\Models\M2Store;
use R3alst\LaravelMagentoTwoConnector\Requests\Auth1CallbackRequest;

class OAuthController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        $data = $request->only(["oauth_consumer_key", "success_call_back"]);
        return redirect()->away($data["success_call_back"]);
    }

    public function callback(Auth1CallbackRequest $request) {
        $data = $request->only(["store_base_url", "oauth_consumer_key", "oauth_consumer_secret", "oauth_verifier"]);
        $storeUrl = rtrim($data["store_base_url"], "/");
        try {
            $oauth = new \OAuth($data["oauth_consumer_key"], $data["oauth_consumer_secret"]);
            $tokenRequest = $oauth->getRequestToken($storeUrl . "/oauth/token/request");
            $oauth->setToken($tokenRequest["oauth_token"], $tokenRequest["oauth_token_secret"]);
            $oauthAccessTokenRequest = $oauth->getAccessToken($storeUrl . "/oauth/token/access");
            $m2store = M2Store::query()->where("store_url", $data["store_base_url"])->first();
            if(!$m2store) {
                $m2store = new M2Store();
                $m2store->status = M2Store::STATUS_ACTIVE;
            }
            $m2store->fill([
                "store_url" => $data["store_base_url"],
                "oauth_consumer_key" => $data["oauth_consumer_key"],
                "oauth_consumer_secret" => $data["oauth_consumer_secret"],
                "oauth_verifier" => $data["oauth_verifier"],
                "access_token" => $oauthAccessTokenRequest["oauth_token"],
                "access_token_secret" => $oauthAccessTokenRequest["oauth_token_secret"]
            ]);
            $m2store->save();
        } catch (\OAuthException $e) {
            Log::error("Magento 2 OAuth Callback", ["message" => $e->getMessage(), "trace" => $e->getTrace()]);
        }
    }
}