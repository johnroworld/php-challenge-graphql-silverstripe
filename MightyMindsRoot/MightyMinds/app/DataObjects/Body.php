<?php

namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

use MyProject\DataObjects\Links;
use MyProject\DataObjects\BodyLink;
use MyProject\DataObjects\Content;

class Body extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'type' => 'Varchar',
        'icon' => 'Varchar'
    ];

    private static $has_many  = [
        'links' => Links::class,
        'bodylinks' => BodyLink::class
    ];

    private static $has_one  = [
        'Content' => Content::class
    ];

    private static $summary_fields = [
        'label',
        'url'
   ];

    private static $table_name = "body";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Body::class)
                ->addFields(['label', 'url', 'type', 'icon'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->operation(SchemaScaffolder::CREATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}