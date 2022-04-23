<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\ClassMenu;

class BottomLinks extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'icon' => 'Varchar'
    ];


    private static $has_one = [
        'ClassMenu' => ClassMenu::class
    ];


    private static $table_name = "bottom_links";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(BottomLinks::class)
                ->addFields(['label', 'url', 'type', 'icon', 'color'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}