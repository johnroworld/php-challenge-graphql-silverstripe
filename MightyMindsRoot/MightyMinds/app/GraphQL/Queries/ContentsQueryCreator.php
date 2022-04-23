<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;


use MyProject\DataObjects\Content;

class ContentsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Contents'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Contents'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $content = Content::singleton();
        if (!$content->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Content::class
            ));
        }
        $list = Content::get();

      
        return $list;
    }
}