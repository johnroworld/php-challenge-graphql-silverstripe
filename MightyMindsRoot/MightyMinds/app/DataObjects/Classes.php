<?php

namespace MyProject\DataObjects;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\AssetAdmin\Forms\UploadField;

use SilverStripe\ORM\DataObject;
use MyProject\DataObjects\Header;

class Classes extends DataObject implements ScaffoldingProvider {

 
    private static $has_many = [
        'Header' => Header::class
    ];
    
    private static $table_name = "classes";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Classes::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }

    

}