<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class MainTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'main'
        ];
    }

    public function fields()
    {   
        $submenusConnection = Connection::create('submenu')
            ->setConnectionType(function () {
                return $this->manager->getType('submenu');
            });
        return [
            'label' => ['type' => Type::string()],
            'url' => ['type' => Type::string()],
            'type' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'submenu' => [
                'type' => $submenusConnection->toType(),
                'args' => $submenusConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($submenusConnection) {
                    return $submenusConnection->resolveList(
                        $obj->submenu(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}