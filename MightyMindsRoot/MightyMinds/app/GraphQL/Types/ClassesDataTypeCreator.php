<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ClassesDataTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'ClassesData'
        ];
    }

    public function fields()
    {   
        $infobarConnection = Connection::create('infobar')
            ->setConnectionType(function () {
                return $this->manager->getType('infobar');
            });
        return [
            'SchoolID' => ['type' => Type::string()],
            'ClassID' => ['type' => Type::string()],
            'Title' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'color' => ['type' => Type::string()],
            'starred' => ['type' => Type::boolean()],
            'archived' => ['type' => Type::boolean()],
            'infobar' => [
                'type' => $infobarConnection->toType(),
                'args' => $infobarConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($infobarConnection) {
                    return $infobarConnection->resolveList(
                        $obj->infobar(),
                        $args,
                        $context
                    );
                }
            ],
            'WeekActivities' => ['type' => Type::string()]
           
        ];
    }
}