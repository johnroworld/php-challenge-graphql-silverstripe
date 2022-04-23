<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\WidgetURL;

class WidgetURLSQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'WidgetURLS'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('WidgetURLS'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $widgeturl = WidgetURL::singleton();
        if (!$widgeturl->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                WidgetURL::class
            ));
        }
        $list = WidgetURL::get();

      
        return $list;
    }
}