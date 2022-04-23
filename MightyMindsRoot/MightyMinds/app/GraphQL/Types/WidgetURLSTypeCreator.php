<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class WidgetURLSTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'WidgetURLS'
        ];
    }

    public function fields()
    {   
        return [
            'label' => ['type' => Type::string()],
            'url' => ['type' => Type::string()],
            'type' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()]
           
        ];
    }
}