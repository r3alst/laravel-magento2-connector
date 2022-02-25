<?php
namespace R3alst\LaravelMagentoTwoConnector\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string entity_type
 * @property string entity_id
 * @property string event_type
 * @property integer status
 * @property string created_at
 * @property string updated_at
*/
class M2StoreWebhook extends Model
{
    const STATUS_IN_PROGRESS = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_PENDING = 0;

    protected $table = "m2store_webhooks";

    protected $fillable = [
        "m2store_id",
        "entity_type",
        "entity_id",
        "event_type",
        "status",
        "created_at",
        "updated_at"
    ];
}
