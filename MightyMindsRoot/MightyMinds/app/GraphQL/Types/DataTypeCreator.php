<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class DataTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Data'
        ];
    }

    public function fields()
    {   
        return [
            'label' => ['type' => Type::string()],
            'value' => ['type' => Type::string()],
            'color' => ['type' => Type::string()]
        ];
          
    }
}