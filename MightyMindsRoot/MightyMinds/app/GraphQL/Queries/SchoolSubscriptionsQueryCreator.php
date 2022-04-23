<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;


use MyProject\DataObjects\SchoolSubscription;

class SchoolSubscriptionsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'schoolSubscriptions'
        ];
    }

    
    public function type()
    {
        return Type::listOf($this->manager->getType('schoolSubscriptions'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $schoolsubscription = SchoolSubscription::singleton();
        if (!$schoolsubscription->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                SchoolSubscription::class
            ));
        }
        $list = SchoolSubscription::get();

      
        return $list;
    }
}