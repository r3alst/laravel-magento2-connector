<?php

namespace R3alst\LaravelMagentoTwoConnector\Console\Commands;

use Illuminate\Console\Command;
use R3alst\LaravelMagentoTwoConnector\Facades\Magento2Helper;

class GenerateMagentoModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'magento2:module:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Magento 2 Module that implement integration for Connector';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {

        $options = [
            "vendor" => $this->ask("Please enter Vendor name: ", "R3alst"),
            "moduleName" => $this->ask("Please enter module name: ", "Integration"),
            "integrationName" => $this->ask("Please enter integration name: ", "r3alstIntegration"),
            "contactEmail" => $this->ask("Please enter your contact email: ", "r3alst@gmail.com"),
            "endpointUrl" => $this->ask("Please enter endpoint url that will receive callback: ", "http://127.0.0.1:8000/api/magento2/v1/oauth/callback"),
            "identityUrl" => $this->ask("Please enter identity url on which magento 2 will redirect you: ", "http://127.0.0.1:8000/magento2/login"),
        ];
        $resourcesList = [];
        while($resource = $this->ask("Please enter q to finish, d to use default resources or a resource name: ", "d")) {
            if($resource === "q") {
                break;
            }
            if($resource === "d") {
                $resourcesList = Magento2Helper::getDefaultAcl();
                break;
            }
            $resourcesList[] = $resource;
        }
        $options["resourcesList"] = $resourcesList;

        $zipFileName = Magento2Helper::createModuleFromOptions($options);

        echo "Module generated (" . $zipFileName . ")\n";
        return 0;
    }
}
