<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\GridURL;

class GridUrlsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'GridUrls'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('GridUrls'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $gridurl = GridURL::singleton();
        if (!$gridurl->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                GridURL::class
            ));
        }
        $list = GridURL::get();

      
        return $list;
    }
}