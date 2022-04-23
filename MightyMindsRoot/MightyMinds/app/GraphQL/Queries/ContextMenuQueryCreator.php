<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;


use MyProject\DataObjects\ContextMenu;

class ContextMenuQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'ContextMenu'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('ContextMenu'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $contextmenu = ContextMenu::singleton();
        if (!$contextmenu->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                ContextMenu::class
            ));
        }
        $list = ContextMenu::get();

      
        return $list;
    }
}