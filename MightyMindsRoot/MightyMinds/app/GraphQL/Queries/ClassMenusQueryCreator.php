<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\ClassMenu;

class ClassMenusQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'classMenus'
        ];
    }   

    public function type()
    {
        return Type::listOf($this->manager->getType('classMenus'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $classmenu = ClassMenu::singleton();
        if (!$classmenu->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                ClassMenu::class
            ));
        }
        $list = ClassMenu::get();

      
        return $list;
    }
}