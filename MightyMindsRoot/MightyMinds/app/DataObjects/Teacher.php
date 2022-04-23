<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

class Teacher extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'lastname' => 'Varchar',
        'firstname' => 'Varchar'
    ];
    private static $table_name = "teachers";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Teacher::class)
                ->addFields(['ID', 'lastname', 'firstname'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->end();

        return $scaffolder;
    }
}