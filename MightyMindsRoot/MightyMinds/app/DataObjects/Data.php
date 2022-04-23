<?php namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;


use MyProject\DataObjects\Report;

class Data extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'value' => 'Varchar',
        'color' => 'Varchar'
    ];
    
    private static $has_one  = [
        'Report' => Report::class
    ];

    private static $table_name = "data";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Data::class)
                ->addFields(['label', 'value', 'color'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}