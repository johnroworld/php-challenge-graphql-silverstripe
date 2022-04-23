<?php namespace MyProject\DataObjects;

use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;

use MyProject\DataObjects\Header;
use MyProject\DataObjects\SidebarWidget;
use MyProject\DataObjects\Body;
use MyProject\DataObjects\Home;

class Content extends DataObject  implements ScaffoldingProvider {

   
    
    private static $has_many  = [
        'Header' => Header::class,
        'SidebarWidget' => SidebarWidget::class,
        'Body' => Body::class
    ];

    private static $has_one = [
        'Home' => Home::class
    ];

    private static $table_name = "contents";

    public function provideGraphQLScaffolding(SchemaScaffolder $scaffolder)
    {
        $scaffolder
            ->type(Content::class)
                ->addFields([])
                ->operation(SchemaScaffolder::READ)
                    ->end()
                ->operation(SchemaScaffolder::UPDATE)
                    ->end()
                ->end();

        return $scaffolder;
    }
}