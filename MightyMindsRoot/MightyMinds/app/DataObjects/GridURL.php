<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;


use MyProject\DataObjects\ClassMenu;

class GridURL extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'type' => 'Varchar',
        'icon' => 'Varchar',
        'color' => 'Varchar'
    ];

    private static $has_one = [
        'ClassMenu' => ClassMenu::class
    ];


    private static $table_name = "grid_urls";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(GridURL::class)
                ->addFields(['label', 'url', 'type', 'icon', 'color'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}