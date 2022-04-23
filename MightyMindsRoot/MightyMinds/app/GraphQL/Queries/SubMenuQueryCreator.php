<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Submenu;

class SubMenuQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'submenu'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('submenu'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = Submenu::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Submenu::class
            ));
        }
        $list = Submenu::get();

      
        return $list;
    }
}