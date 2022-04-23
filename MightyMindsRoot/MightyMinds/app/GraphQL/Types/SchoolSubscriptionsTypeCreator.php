<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class SchoolSubscriptionsTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'schoolSubscriptions'
        ];
    }

    public function fields()
    {   
        return [
            'current' => ['type' => Type::string()],
            'all' => ['type' => Type::string()]
           
        ];
    }
}