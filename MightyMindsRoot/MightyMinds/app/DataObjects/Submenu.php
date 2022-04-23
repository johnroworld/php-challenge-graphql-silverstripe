<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;


use MyProject\DataObjects\Main;
use MyProject\DataObjects\TopMenu;
use MyProject\DataObjects\URL;

class Submenu extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'type' => 'Varchar',
        'icon' => 'Varchar'
    ];
    
    private static $has_one  = [
        'Main' => Main::class,        
        'Top Menu' => TopMenu::class,        
        'URL' => URL::class
    ];

    private static $table_name = "submenus";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Main::class)
                ->addFields(['label', 'url', 'type', 'icon'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}