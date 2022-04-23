<?php namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

use MyProject\DataObjects\Data;
use MyProject\DataObjects\Header;

class Report extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'Title' => 'Varchar'
    ];

    private static $has_many  = [
        'Data' => Data::class
    ];

    private static $has_one  = [
        'Header' => Header::class
    ];



    private static $table_name = "report_data";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Report::class)
                ->addFields(['Title'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}