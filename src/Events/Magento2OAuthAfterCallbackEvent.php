<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2OAuthAfterCallbackEvent
{
    use Dispatchable;

    protected string $storeUrl;
    protected string $consumerKey;
    protected string $consumerSecret;
    protected string $oauthVerifier;
    protected string $accessToken;
    protected string $accessTokenSecret;

    /**
     * Create a new event instance.
     *
     * @param $storeUrl
     * @param $consumerKey
     * @param $consumerSecret
     * @param $oauthVerifier
     * @param $accessToken
     * @param $accessTokenSecret
     */
    public function __construct($storeUrl, $consumerKey, $consumerSecret, $oauthVerifier, $accessToken, $accessTokenSecret)
    {

        $this->storeUrl = $storeUrl;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->oauthVerifier = $oauthVerifier;
        $this->accessToken = $accessToken;
        $this->accessTokenSecret = $accessTokenSecret;
    }
}
