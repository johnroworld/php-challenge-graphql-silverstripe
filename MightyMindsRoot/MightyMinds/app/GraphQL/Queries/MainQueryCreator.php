<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Main;

class MainQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'main'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('main'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = Main::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Main::class
            ));
        }
        $list = Main::get();

      
        return $list;
    }
}