<?php namespace MyProject\DataObjects;

use GraphQL\Type\Definition\ResolveInfo;
use SilverStripe\GraphQL\Scaffolding\Interfaces\ScaffoldingProvider;
use SilverStripe\GraphQL\Scaffolding\Scaffolders\SchemaScaffolder;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ManyManyList;

use MyProject\DataObjects\Submenu;
use MyProject\DataObjects\SidebarWidget;
use MyProject\DataObjects\Header;

class URL extends DataObject  implements ScaffoldingProvider {

    private static $db = [
        'label' => 'Varchar',
        'url' => 'Varchar',
        'type' => 'Varchar',
        'icon' => 'Varchar',
        'color' => 'Varchar'
    ];

    private static $has_many  = [
        'submenu' => Submenu::class
    ];

    private static $has_one = [
        'Sidebar Widget' => SidebarWidget::class,        
        'Header' => Header::class
    ];

    private static $table_name = "urls";

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