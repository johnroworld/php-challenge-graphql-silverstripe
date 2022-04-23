<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class CreateNewClassesTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'createNewClasses'
        ];
    }

    public function fields()
    {   
        $dropdownsConnection = Connection::create('dropdowns')
            ->setConnectionType(function () {
                return $this->manager->getType('dropdowns');
            });
        $bottomlinksConnection = Connection::create('newclass_BottomLinks')
            ->setConnectionType(function () {
                return $this->manager->getType('BottomLinks');
            });
        return [
            'dropdowns' =>[
                'type' => $dropdownsConnection->toType(),
                'args' => $dropdownsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($dropdownsConnection) {
                    return $dropdownsConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ],
            'title' => ['type' => Type::string()],
            'buttons' => [
                'type' => $bottomlinksConnection->toType(),
                'args' => $bottomlinksConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($bottomlinksConnection) {
                    return $bottomlinksConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}