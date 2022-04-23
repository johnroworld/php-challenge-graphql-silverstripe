<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;


class SidebarWidgetsTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'SidebarWidgets'
        ];
    }

    public function fields()
    {   
        $wigeturlsConnection = Connection::create('WidgetURLS')
            ->setConnectionType(function () {
                return $this->manager->getType('WidgetURLS');
            });
        return [
            'Title' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'Template' => ['type' => Type::string()],
            'ImgUrl' => ['type' => Type::string()],
            'Text' => ['type' => Type::string()],
            'urls' => [
                'type' => $wigeturlsConnection->toType(),
                'args' => $wigeturlsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($wigeturlsConnection) {
                    return $wigeturlsConnection->resolveList(
                        $obj->WidgetURLS(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}