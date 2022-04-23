<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\Main;
use MyProject\DataObjects\Help;

class TopMenu extends DataObject  implements ScaffoldingProvider {

   
    
    private static $has_many  = [
        'main' => Main::class,
        'help' => Help::class
    ];

    private static $table_name = "topmenus";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(TopMenu::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}