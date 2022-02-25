<?php
namespace R3alst\LaravelMagentoTwoConnector\Events;

use Illuminate\Foundation\Events\Dispatchable;

class Magento2WebhookReceivedEvent
{
    use Dispatchable;

    public string $webhookId;

    /**
     * Create a new event instance.
     *
     * @param $webhookId
     */
    public function __construct($webhookId)
    {
        $this->webhookId = $webhookId;
    }
}
