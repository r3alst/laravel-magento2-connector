<?php
namespace R3alst\LaravelMagentoTwoConnector\Http\Controllers;

use R3alst\LaravelMagentoTwoConnector\Requests\Auth1CallbackRequest;

class OAuthController
{
    public function login() {

    }

    public function callback(Auth1CallbackRequest $request) {
        $data = $request->only(["store_base_url", "oauth_consumer_key", "oauth_consumer_secret", "oauth_verifier"]);
        $storeUrl = rtrim($data["store_base_url"], "/");
        try {
            $oauth = new \OAuth($data["oauth_consumer_key"], $data["oauth_consumer_secret"]);
            $tokenRequest = $oauth->getRequestToken($storeUrl . "/oauth/token/request");
            $oauth->setToken($tokenRequest["oauth_token"], $tokenRequest['oauth_token_secret']);
            $oauthAccessToken = $oauth->getAccessToken($storeUrl . "/oauth/token/access");
        } catch (\OAuthException $e) {
        }
    }
}