<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\TopMenu;

class Help extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'type' => 'Varchar',
        'icon' => 'Varchar'
    ];


    private static $has_one = [
        'Top Menu' => TopMenu::class
    ];

    private static $table_name = "help";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Help::class)
                ->addFields(['label', 'url', 'type', 'icon'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}