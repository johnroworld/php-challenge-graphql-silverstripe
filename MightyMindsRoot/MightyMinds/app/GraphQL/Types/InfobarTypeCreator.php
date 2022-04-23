<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class InfobarTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'infobar'
        ];
    }

    public function fields()
    {   
        return [
            'icon' => ['type' => Type::string()],
            'year' => ['type' => Type::string()],
            'classname' => ['type' => Type::string()]
           
        ];
    }
}