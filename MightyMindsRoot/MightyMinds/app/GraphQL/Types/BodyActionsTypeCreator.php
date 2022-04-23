<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class BodyActionsTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'bodyActions'
        ];
    }

    public function fields()
    {   
        return [
            'title' => ['type' => Type::string()],
            'text' => ['type' => Type::string()],
            'icon' => ['type' => Type::string()],
            'action' => ['type' => Type::string()]
        ];
    }
}