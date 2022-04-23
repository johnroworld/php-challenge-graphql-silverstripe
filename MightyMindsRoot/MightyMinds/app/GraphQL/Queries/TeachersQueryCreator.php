<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Teacher;

class TeachersQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Teachers'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Teachers'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = Teacher::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Teacher::class
            ));
        }
        $list = Teacher::get();

      
        return $list;
    }
}