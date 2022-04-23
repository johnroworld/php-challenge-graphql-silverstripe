<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;


class Infobar extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'icon' => 'Varchar',
        'year' => 'Varchar',
        'class_name' => 'Varchar'
    ];



    private static $table_name = "infobars";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Infobar::class)
                ->addFields(['icon', 'year', 'classname'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}