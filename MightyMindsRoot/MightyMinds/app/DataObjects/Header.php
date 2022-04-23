<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\Report;
use MyProject\DataObjects\URL;
use MyProject\DataObjects\Content;
use MyProject\DataObjects\Classes;

class Header extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'WelcomeMessage' => 'Varchar',
        'Title' => 'Varchar',
        'Icon' => 'Varchar'
    ];
    
    private static $has_many  = [
        'Report' => Report::class,
        'URL' => URL::class
    ];
    
    
    private static $has_one  = [
        'Content' => Content::class,
        'Classess' => Classes::class
    ];

    private static $table_name = "headers";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Header::class)
                ->addFields(['WelcomeMessage','Title','Icon'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}