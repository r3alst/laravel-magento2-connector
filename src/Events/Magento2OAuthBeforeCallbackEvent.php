<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2OAuthBeforeCallbackEvent
{
    use Dispatchable;

    protected string $storeUrl;
    protected string $consumerKey;
    protected string $consumerSecret;
    protected string $oauthVerifier;

    /**
     * Create a new event instance.
     *
     * @param $storeUrl
     * @param $consumerKey
     * @param $consumerSecret
     * @param $oauthVerifier
     */
    public function __construct($storeUrl, $consumerKey, $consumerSecret, $oauthVerifier)
    {

        $this->storeUrl = $storeUrl;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->oauthVerifier = $oauthVerifier;
    }
}
