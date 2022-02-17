<?php
namespace R3alst\LaravelMagentoTwoConnector\Helper;

use Illuminate\Support\Str;
use R3alst\LaravelMagentoTwoConnector\Models\ModuleArtifact;

class Magento2Helper
{
    /**
     * @return string[]
     */
    public function getDefaultAcl() {
        return [
            "Magento_Customer::customer",
            "Magento_Log::online",
            "Magento_Sales::sales",
            "Magento_Sales::sales_operation",
            "Magento_Sales::sales_order",
            "Magento_Sales::actions",
            "Magento_Sales::reorder",
            "Magento_Catalog::catalog",
            "Magento_Catalog::catalog_inventory",
            "Magento_Catalog::products"
        ];
    }

    public function createModuleFromOptions($options = [], $logArtifact = true) {
        $_options = array_merge([
            "vendor" => "R3alst",
            "moduleName" => "Integration",
            "integrationName" => "r3alstIntegration",
            "contactEmail" => "r3alst@gmail.com",
            "endpointUrl" => "https://m2connector.modsolutionz.com/api/magento2/v1/oauth/callback",
            "identityUrl" => "https://m2connector.modsolutionz.com/magento2/login",
            "resourcesList" => $this->getDefaultAcl()
        ], $options);

        $resourcesList = "";
        foreach ($_options["resourcesList"] as $resource) {
            $resourcesList .= "<resource name=\"" . $resource . "\"/>\n";
        }
        $zipFileName = Str::random(40) . ".zip";
        $zipArchive = new \ZipArchive();
        $zipArchive->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $moduleBasePath = $_options["vendor"] . "/" . $_options["moduleName"];
        $moduleFiles = [
            [
                "destination" => $moduleBasePath . "/registration.php",
                "source" => __DIR__ . "/../../stubs/registration.php.stub"
            ],
            [
                "destination" => $moduleBasePath . "/etc/module.xml",
                "source" => __DIR__ . "/../../stubs/module.xml.stub"
            ],
            [
                "destination" => $moduleBasePath . "/etc/integration/api.xml",
                "source" => __DIR__ . "/../../stubs/api.xml.stub"
            ],
            [
                "destination" => $moduleBasePath . "/etc/integration/config.xml",
                "source" => __DIR__ . "/../../stubs/config.xml.stub"
            ],
            [
                "destination" => $moduleBasePath . "/Setup/InstallData.php",
                "source" => __DIR__ . "/../../stubs/InstallData.php.stub"
            ]
        ];
        foreach ($moduleFiles as $moduleFile) {
            $zipArchive->addFromString($moduleFile["destination"], str_replace(
                ["{{vendor}}", "{{moduleName}}", "{{integrationName}}", "{{resourceList}}", "{{contactEmail}}", "{{endpointUrl}}", "{{identityUrl}}"],
                [$_options["vendor"], $_options["moduleName"], $_options["integrationName"], $resourcesList, $_options["contactEmail"], $_options["endpointUrl"], $_options["identityUrl"]],
                \file_get_contents($moduleFile["source"])
            ));
        }
        $zipArchive->close();
        if($logArtifact) {
            $moduleArtifact = new ModuleArtifact();
            $moduleArtifact->fill([
                "zip_filename" => $zipFileName,
                "options" => $_options
            ]);
            $moduleArtifact->save();
        }
        return $zipFileName;
    }
}