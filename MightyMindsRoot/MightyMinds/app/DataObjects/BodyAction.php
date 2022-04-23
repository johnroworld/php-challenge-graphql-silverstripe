<?php

namespace MyProject\DataObjects;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\AssetAdmin\Forms\UploadField;

use SilverStripe\ORM\DataObject;

class BodyAction extends DataObject implements ScaffoldingProvider {

    private static $db = [
        "title" => "Varchar",
        "text" => "Varchar",
        "icon" => "Varchar",
        "action" => "Varchar"
    ];


    
    private static $table_name = "body_actions";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(BodyAction::class)
                ->addFields(['title', 'text', 'icon', 'action'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }

    

}