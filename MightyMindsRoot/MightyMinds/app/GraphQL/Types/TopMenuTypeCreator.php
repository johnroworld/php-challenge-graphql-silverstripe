<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class TopMenuTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'TopMenu'
        ];
    }

    public function fields()
    {   
        $mainConnection = Connection::create('main')
            ->setConnectionType(function () {
                return $this->manager->getType('main');
            });
        $helpConnection = Connection::create('help')
            ->setConnectionType(function () {
                return $this->manager->getType('help');
            });
        return [
            'main' => [
                'type' => $mainConnection->toType(),
                'args' => $mainConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($mainConnection) {
                    return $mainConnection->resolveList(
                        $obj->main(),
                        $args,
                        $context
                    );
                }
            ],
            
            'help' => [
                'type' => $helpConnection->toType(),
                'args' => $helpConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($helpConnection) {
                    return $helpConnection->resolveList(
                        $obj->help(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}