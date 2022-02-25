<?php
namespace R3alst\LaravelMagentoTwoConnector\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConsumerSignature implements Rule
{
    protected string $consumerSecret;
    protected string $consumerKey;

    /**
     * @param string $consumerKey
     * @param string $consumerSecret
     */
    public function __construct(string $consumerKey = "", string $consumerSecret = "")
    {
        $this->consumerSecret = $consumerSecret;
        $this->consumerKey = $consumerKey;
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return $value === hash_hmac("SHA256", $this->consumerKey, $this->consumerSecret);
    }

    /**
     * @return string
     */
    public function message() {
        return "The :attribute is invalid.";
    }
}