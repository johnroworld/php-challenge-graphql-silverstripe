<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\BottomLinks;

class BottomLinksQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'BottomLinks'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('BottomLinks'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $bottomlinks = BottomLinks::singleton();
        if (!$bottomlinks->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                BottomLinks::class
            ));
        }
        $list = BottomLinks::get();

      
        return $list;
    }
}