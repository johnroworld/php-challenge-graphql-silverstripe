<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class BottomLinksTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'BottomLinks'
        ];
    }

    public function fields()
    {   
        return [
            'label' => ['type' => Type::string()],
            'url' => ['type' => Type::string()],
            'type' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'color' => ['type' => Type::string()]
           
        ];
    }
}