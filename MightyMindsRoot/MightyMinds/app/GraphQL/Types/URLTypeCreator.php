<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class URLTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'url'
        ];
    }

    public function fields()
    {   
        $submenu2Connection = Connection::create('submenu2')
            ->setConnectionType(function () {
                return $this->manager->getType('submenu');
            });
        return [
            'type' => ['type' => Type::string()],
            'label' => ['type' => Type::string()],
            'url' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'color' => ['type' => Type::string()],
            'submenu' => [
                'type' => $submenu2Connection->toType(),
                'args' => $submenu2Connection->args(),
                'resolve' => function ($obj, $args, $context) use ($submenu2Connection) {
                    return $submenu2Connection->resolveList(
                        $obj->submenu(),
                        $args,
                        $context
                    );
                }
            ],
            'modal' => ['type' => Type::string()]
        ];
          
    }
}