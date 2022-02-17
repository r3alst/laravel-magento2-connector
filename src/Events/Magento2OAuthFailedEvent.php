<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2OAuthFailedEvent
{
    use Dispatchable;

    public string $storeUrl;
    public string $consumerKey;
    public string $consumerSecret;

    /**
     * Create a new event instance.
     *
     * @param $storeUrl
     * @param $consumerKey
     * @param $consumerSecret
     */
    public function __construct($storeUrl, $consumerKey, $consumerSecret)
    {
        //
        $this->storeUrl = $storeUrl;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }
}
