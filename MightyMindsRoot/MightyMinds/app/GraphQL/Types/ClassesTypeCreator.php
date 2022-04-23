<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ClassesTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Classes'
        ];
    }

    public function fields()
    {   
        $submenusConnection = Connection::create('classes_Header')
            ->setConnectionType(function () {
                return $this->manager->getType('Header');
            });
        return [
            'submenu' => [
                'type' => $submenusConnection->toType(),
                'args' => $submenusConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($submenusConnection) {
                    return $submenusConnection->resolveList(
                        $obj->Header(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}