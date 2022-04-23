<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Infobar;

class InfobarQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'infobar'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('infobar'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $infobar = Infobar::singleton();
        if (!$infobar->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Infobar::class
            ));
        }
        $list = Infobar::get();

      
        return $list;
    }
}