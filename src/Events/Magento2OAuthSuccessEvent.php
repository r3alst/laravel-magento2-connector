<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2OAuthSuccessEvent
{
    use Dispatchable;

    public string $m2StoreId;

    /**
     * Create a new event instance.
     *
     * @param $m2StoreId
     */
    public function __construct($m2StoreId)
    {
        $this->m2StoreId = $m2StoreId;
    }
}
