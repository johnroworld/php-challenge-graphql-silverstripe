<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

class ClassesData extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'SchoolID' => 'Varchar',
        'ClassID' => 'Varchar',
        'Title' => 'Varchar',
        'icon' => 'Varchar',
        'color' => 'Varchar',
        'starred' => 'Boolean',
        'archived' => 'Boolean',
        'WeekActivities' => 'Varchar'
    ];
    private static $table_name = "classes_data";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(ClassData::class)
                ->addFields(['SchoolID', 'ClassID', 'Title', 'icon', 'color', 'starred', 'archived', 'WeekActivities'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}