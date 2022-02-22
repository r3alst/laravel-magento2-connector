<?php

namespace R3alst\LaravelMagentoTwoConnector\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string zip_filename
 * @property integer id
 * @property array options
 * @property string created_at
 * @property string updated_at
*/
class ModuleArtifact extends Model
{
    protected $table = "module_artifacts";
    protected $fillable = [
        "zip_filename",
        "options"
    ];
    protected $casts = [
        "options" => "array"
    ];
}