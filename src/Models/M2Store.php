<?php
namespace R3alst\LaravelMagentoTwoConnector\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string store_url
 * @property string oauth_consumer_key
 * @property string oauth_consumer_secret
 * @property string oauth_verifier
 * @property string access_token
 * @property string access_token_secret
 * @property integer status
 * @property string created_at
 * @property string updated_at
*/
class M2Store extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_SUSPENDED = 2;

    protected $table = "m2stores";

    protected $fillable = [
        "store_url",
        "oauth_consumer_key",
        "oauth_consumer_secret",
        "oauth_verifier",
        "access_token",
        "access_token_secret",
        "status"
    ];
}
