<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\ClassesData;

class ClassesDataQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'ClassesData'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('ClassesData'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $classesdata = ClassesData::singleton();
        if (!$classesdata->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                ClassesData::class
            ));
        }
        $list = ClassesData::get();

      
        return $list;
    }
}