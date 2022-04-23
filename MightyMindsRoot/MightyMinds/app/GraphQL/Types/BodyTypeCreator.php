<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class BodyTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Body'
        ];
    }

    public function fields()
    {
        $linksConnection = Connection::create('Links')
            ->setConnectionType(function () {
                return $this->manager->getType('Links');
            });
        $bodylinksConnection = Connection::create('BodyLinks')
            ->setConnectionType(function () {
                return $this->manager->getType('BodyLinks');
            });
            return [
                'label' => ['type' => Type::string()],
                'url' => ['type' => Type::string()],
                'type' => ['type' => Type::string()],
                'icon' => ['type' => Type::string()],
                'Links' => [
                    'type' => $linksConnection->toType(),
                    'args' => $linksConnection->args(),
                    'resolve' => function ($obj, $args, $context) use ($linksConnection) {
                        return $linksConnection->resolveList(
                            $obj->Links(),
                            $args,
                            $context
                        );
                    }
                ],
                'BodyLinks' => [
                    'type' => $bodylinksConnection->toType(),
                    'args' => $bodylinksConnection->args(),
                    'resolve' => function ($obj, $args, $context) use ($bodylinksConnection) {
                        return $bodylinksConnection->resolveList(
                            $obj->BodyLinks(),
                            $args,
                            $context
                        );
                    }
                ]
            ];
    }
}