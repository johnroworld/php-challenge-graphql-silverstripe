<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use SilverStripe\Security\Member;
use MyProject\DataObjects\SchoolSubscription;

class Session extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'isTeacher' => 'Boolean',
        'csrf' => 'Varchar',
        'schoolCourses' => 'Boolean',
        'isAcademicForce' => 'Boolean',
        'redirectUrl' => 'Varchar'
    ];

    private static $many_many = [
        'SchoolSubscription' => SchoolSubscription::class,
        'Member' => Member::class
    ];
    private static $table_name = "sessions";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(ClassData::class)
                ->addFields(['isTeacher', 'csrf', 'schoolCourses', 'isAcademicForce', 'redirectUrl'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}