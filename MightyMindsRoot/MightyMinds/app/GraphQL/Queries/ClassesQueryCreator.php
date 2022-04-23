<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Classes;

class ClassesQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Classes'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Classes'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $classes = Classes::singleton();
        if (!$classes->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Classes::class
            ));
        }
        $list = Classes::get();

      
        return $list;
    }
}