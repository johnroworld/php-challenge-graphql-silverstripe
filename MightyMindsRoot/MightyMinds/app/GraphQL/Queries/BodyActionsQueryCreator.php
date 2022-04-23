<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\BodyAction;

class BodyActionsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'bodyActions'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('bodyActions'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $bodyaction = BodyAction::singleton();
        if (!$bodyaction->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                BodyAction::class
            ));
        }
        $list = BodyAction::get();

      
        return $list;
    }
}