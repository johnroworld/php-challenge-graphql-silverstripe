<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\URL;

class URLQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'url'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('url'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $url = URL::singleton();
        if (!$url->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                URL::class
            ));
        }
        $list = URL::get();

      
        return $list;
    }
}