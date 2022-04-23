<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Header;

class HeaderQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Header'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Header'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $header = Header::singleton();
        if (!$header->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Header::class
            ));
        }
        $list = Header::get();

      
        return $list;
    }
}