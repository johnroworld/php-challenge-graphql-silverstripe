<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\BodyLink;

class BodyLinksQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'BodyLinks'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('BodyLinks'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $bodylink = BodyLink::singleton();
        if (!$bodylink->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                BodyLink::class
            ));
        }
        $list = BodyLink::get();

      
        return $list;
    }
}