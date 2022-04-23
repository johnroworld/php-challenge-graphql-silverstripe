<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\Security\Member;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Help;

class HelpQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'help'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('help'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = Help::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Help::class
            ));
        }
        $list = Help::get();

      
        return $list;
    }
}