<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ContentsTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Contents'
        ];
    }

    public function fields()
    {   
        $headerConnection = Connection::create('header')
            ->setConnectionType(function () {
                return $this->manager->getType('Header');
            });
        $sidebarwidgetsConnection = Connection::create('sidebarwidgets')
            ->setConnectionType(function () {
                return $this->manager->getType('SidebarWidgets');
            });
        $bodyConnection = Connection::create('body')
            ->setConnectionType(function () {
                return $this->manager->getType('Body');
            });
        return [
            'Header' => [
                'type' => $headerConnection->toType(),
                'args' => $headerConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($headerConnection) {
                    return $headerConnection->resolveList(
                        $obj->Header(),
                        $args,
                        $context
                    );
                }
            ],
            'SidebarWidgets' => [
                'type' => $sidebarwidgetsConnection->toType(),
                'args' => $sidebarwidgetsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($sidebarwidgetsConnection) {
                    return $sidebarwidgetsConnection->resolveList(
                        $obj->SidebarWidget(),
                        $args,
                        $context
                    );
                }
            ],
            'Body' => [
                'type' => $bodyConnection->toType(),
                'args' => $bodyConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($bodyConnection) {
                    return $bodyConnection->resolveList(
                        $obj->Body(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}