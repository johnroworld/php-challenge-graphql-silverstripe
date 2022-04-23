<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class DropdownTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'dropdown'
        ];
    }

    public function fields()
    {   
        return [
            'option' => ['type' => Type::string()],
            'value' => ['type' => Type::string()]
           
        ];
    }
}