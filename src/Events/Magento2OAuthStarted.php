<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2OAuthStarted
{
    use Dispatchable;

    public string $consumerKey;
    public string $successCallback;

    /**
     * Create a new event instance.
     *
     * @param $consumerKey
     * @param $successCallback
     */
    public function __construct($consumerKey, $successCallback)
    {
        $this->consumerKey = $consumerKey;
        $this->successCallback = $successCallback;
    }
}
