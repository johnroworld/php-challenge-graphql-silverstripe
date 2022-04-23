<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Links;

class LinksQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Links'
        ];
    }    

    public function type()
    {
        return Type::listOf($this->manager->getType('Links'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = Links::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Links::class
            ));
        }
        $list = Links::get();

      
        return $list;
    }
}