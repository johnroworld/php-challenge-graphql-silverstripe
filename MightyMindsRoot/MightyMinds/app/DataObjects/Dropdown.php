<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\Dropdowns;

class Dropdown extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'option' => 'Varchar',
        'value' => 'Varchar'
    ];

    private static $has_one = [
        'dropdowns' => Dropdowns::class
    ];

    private static $table_name = "dropdowns";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Dropdown::class)
                ->addFields(['option', 'value'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}