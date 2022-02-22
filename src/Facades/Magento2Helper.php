<?php

namespace R3alst\LaravelMagentoTwoConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getDefaultAcl()
 * @method static string createModuleFromOptions($options = [], $logArtifact = true)
 * @method static array getBasicAclList()
*/
class Magento2Helper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \R3alst\LaravelMagentoTwoConnector\Helper\Magento2Helper::class;
    }
}