<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class HomePageTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Home'
        ];
    }

    public function fields()
    {   
        $contentsConnection = Connection::create('contents')
            ->setConnectionType(function () {
                return $this->manager->getType('Contents');
            });
        return [
            'Contents' => [
                'type' => $contentsConnection->toType(),
                'args' => $contentsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($contentsConnection) {
                    return $contentsConnection->resolveList(
                        $obj->Contents(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}