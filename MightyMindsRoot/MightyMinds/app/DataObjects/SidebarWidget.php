<?php namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

use MyProject\DataObjects\WidgetURL;
use MyProject\DataObjects\Content;

class SidebarWidget extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'Title' => 'Varchar',
        'icon' => 'Varchar',
        'Template' => 'Varchar',
        'ImgUrl' => 'Varchar',
        'Text' => 'Varchar'
    ];

    private static $has_many  = [
        'WidgetURLS' => WidgetURL::class
    ];

    private static $has_one  = [
        'Content' => Content::class
    ];

    private static $table_name = "sidebar_widgets";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Main::class)
                ->addFields(['label', 'url', 'type', 'icon'])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}