<?php

namespace R3alst\LaravelMagentoTwoConnector\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use R3alst\LaravelMagentoTwoConnector\Models\M2Store;
use R3alst\LaravelMagentoTwoConnector\Rules\ConsumerSignature;

class WebhookRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules() {
        $consumerKey = $this->post("consumer_key");
        $consumerSecret = "";
        /** @var M2Store $m2store */
        $m2store = M2Store::query()->where("oauth_consumer_key", $this->post("consumer_key"))->first();
        if($m2store) {
            $consumerSecret = $m2store->oauth_consumer_secret;
        }
        return [
            "entity_type" => "required",
            "entity_id" => "required",
            "event_type" => "required",
            "consumer_key" => "required",
            "consumer_signature" => ["required", new ConsumerSignature($consumerKey, $consumerSecret)]
        ];
    }
}