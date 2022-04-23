<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class HeaderTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Header'
        ];
    }

    public function fields()
    {   
        $reportConnection = Connection::create('report')
            ->setConnectionType(function () {
                return $this->manager->getType('Report');
            });
        $urlConnection = Connection::create('url2')
            ->setConnectionType(function () {
                return $this->manager->getType('url');
            });
        return [
            'Report' => [
                'type' => $reportConnection->toType(),
                'args' => $reportConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($reportConnection) {
                    return $reportConnection->resolveList(
                        $obj->Report(),
                        $args,
                        $context
                    );
                }
            ],
            'WelcomeMessage' => ['type' => Type::string()],
            'urls' => [
                'type' => $urlConnection->toType(),
                'args' => $urlConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($urlConnection) {
                    return $urlConnection->resolveList(
                        $obj->URL(),
                        $args,
                        $context
                    );
                }
            ],
            'Title' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()]
        ];
          
    }
}