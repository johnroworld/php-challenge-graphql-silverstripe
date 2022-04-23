<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;


use MyProject\DataObjects\GridURL;
use MyProject\DataObjects\BottomLinks;
use MyProject\DataObjects\ContextMenu;

class ClassMenu extends DataObject  implements ScaffoldingProvider {

      
    private static $has_many  = [
        'urls' => GridURL::class,        
        'bottomLinks' => BottomLinks::class,        
        'ContextMenu' => ContextMenu::class
    ];

    private static $table_name = "class_menus";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(ClassMenu::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}