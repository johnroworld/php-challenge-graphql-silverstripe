<?php

namespace MyProject\DataObjects;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\AssetAdmin\Forms\UploadField;

use SilverStripe\ORM\DataObject;
use MyProject\DataObjects\Body;

class Links extends DataObject implements ScaffoldingProvider {

    private static $db = [
        "label" => "Varchar",
        "url" => "Varchar",
        "type" => "Varchar",
        "icon" => "Varchar",
        "color" => "Varchar"
    ];

    private static $has_one = [
        'Body' => Body::class
    ];
    
    private static $table_name = "Link";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Links::class)
                ->addFields(['label', 'url', 'type', 'icon', 'color'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }

    

}