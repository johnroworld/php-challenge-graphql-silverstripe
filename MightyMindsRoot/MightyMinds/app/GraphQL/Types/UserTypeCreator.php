<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class UserTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'user'
        ];
    }

    public function fields()
    {   
        return [
            'FirstName' => ['type' => Type::string()],
            'Surname' => ['type' => Type::string()],
            'Email' => ['type' => Type::string()],
            'SchoolName' => ['type' => Type::string()],
            'ID' => ['type' => Type::nonNull(Type::id())],
            'SchoolID' => ['type' => Type::nonNull(Type::id())],
            'IsSchoolAdmin' => ['type' => Type::boolean()]
           
        ];
    }
}