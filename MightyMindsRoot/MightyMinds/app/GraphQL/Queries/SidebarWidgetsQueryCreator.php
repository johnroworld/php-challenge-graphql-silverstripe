<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;


use MyProject\DataObjects\SidebarWidget;

class SidebarWidgetsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'SidebarWidgets'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('SidebarWidgets'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $sidebarwiget = SidebarWidget::singleton();
        if (!$sidebarwiget->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                SidebarWidget::class
            ));
        }
        $list = SidebarWidget::get();

      
        return $list;
    }
}