<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class TeacherTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Teachers'
        ];
    }

    public function fields()
    {   
        return [
            'ID' => ['type' => Type::nonNull(Type::id())],
            'lastname' => ['type' => Type::string()],
            'firstname' => ['type' => Type::string()]
           
        ];
    }
}