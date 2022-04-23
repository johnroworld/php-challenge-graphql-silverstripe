<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ClassesDetailsTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'ClassesDetails'
        ];
    }

    public function fields()
    {   
        $classmenusConnection = Connection::create('ClassessDetails_classMenus')
            ->setConnectionType(function () {
                return $this->manager->getType('classMenus');
            });
        $classdataConnection = Connection::create('ClassessDetails_ClassesData')
            ->setConnectionType(function () {
                return $this->manager->getType('ClassesData');
            });
        return [
            'classMenus' => [
                'type' => $classmenusConnection->toType(),
                'args' => $classmenusConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($classmenusConnection) {
                    return $classmenusConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ],            
            'data' => [
                'type' => $classdataConnection->toType(),
                'args' => $classdataConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($classdataConnection) {
                    return $classdataConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}