<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Dropdowns;

class DropdownsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'dropdowns'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('dropdowns'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $dropdowns = Dropdowns::singleton();
        if (!$dropdowns->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Dropdowns::class
            ));
        }
        $list = Dropdowns::get();

      
        return $list;
    }
}