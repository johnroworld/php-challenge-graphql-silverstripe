<?php

namespace MyProject\DataObjects;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\AssetAdmin\Forms\UploadField;

use SilverStripe\ORM\DataObject;
use MyProject\DataObjects\Session;

class SchoolSubscription extends DataObject implements ScaffoldingProvider {

    private static $db = [
        "current" => "Varchar",
        "all" => "Varchar"
    ];

    private static $many_many = [
        'Session' => Session::class
    ];
 
    
    private static $table_name = "school_subscriptions";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(SchoolSubscription::class)
                ->addFields(['current', 'all'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }

    

}