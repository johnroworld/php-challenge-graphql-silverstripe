<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\Content;

class Home extends DataObject  implements ScaffoldingProvider {


    private static $has_many  = [
        'Contents' => Content::class
    ];

    private static $table_name = "home";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Home::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}