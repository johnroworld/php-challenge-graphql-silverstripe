<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class SubMenuTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'submenu'
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