<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\ProfileMenu;

class ProfileMenuQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'ProfileMenu'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('ProfileMenu'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $member = ProfileMenu::singleton();
        if (!$member->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                ProfileMenu::class
            ));
        }
        $list = ProfileMenu::get();

      
        return $list;
    }
}