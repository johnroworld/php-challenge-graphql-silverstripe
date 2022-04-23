<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ClassMenusTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'classMenus'
        ];
    }

    public function fields()
    {   
        $gridurlsConnection = Connection::create('GridUrls')
            ->setConnectionType(function () {
                return $this->manager->getType('GridUrls');
            });
        $bottomlinksConnection = Connection::create('BottomLinks')
            ->setConnectionType(function () {
                return $this->manager->getType('BottomLinks');
            });
        $contextmenuConnection = Connection::create('ContextMenu')
            ->setConnectionType(function () {
                return $this->manager->getType('ContextMenu');
            });
        return [
            'urls' => [
                'type' => $gridurlsConnection->toType(),
                'args' => $gridurlsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($gridurlsConnection) {
                    return $gridurlsConnection->resolveList(
                        $obj->urls(),
                        $args,
                        $context
                    );
                }
            ],
            'bottomLinks' => [
                'type' => $bottomlinksConnection->toType(),
                'args' => $bottomlinksConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($bottomlinksConnection) {
                    return $bottomlinksConnection->resolveList(
                        $obj->bottomLinks(),
                        $args,
                        $context
                    );
                }
            ],
            'ContextMenu' => [
                'type' => $contextmenuConnection->toType(),
                'args' => $contextmenuConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($contextmenuConnection) {
                    return $contextmenuConnection->resolveList(
                        $obj->ContextMenu(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}