<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Body;

class BodyQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Body'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Body'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $body = Body::singleton();
        if (!$body->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Body::class
            ));
        }
        $list = Body::get();

      
        return $list;
    }
}