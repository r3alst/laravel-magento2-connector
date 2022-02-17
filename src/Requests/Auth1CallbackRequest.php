<?php

namespace R3alst\LaravelMagentoTwoConnector\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class Auth1CallbackRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules() {
        return [
            "store_base_url" => "required",
            "oauth_consumer_key" => "required",
            "oauth_consumer_secret" => "required",
            "oauth_verifier" => "required"
        ];
    }
}