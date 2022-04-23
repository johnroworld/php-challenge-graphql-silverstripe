<?php namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

use MyProject\DataObjects\Dropdown;

class Dropdowns extends DataObject  implements ScaffoldingProvider {

 

    private static $has_many  = [
        'year' => Dropdown::class,        
        'subjects' => Dropdown::class
    ];


    private static $table_name = "dropdowns_group";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Body::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}