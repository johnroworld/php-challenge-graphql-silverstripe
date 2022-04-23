<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class SessionTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Session'
        ];
    }

    public function fields()
    {   
        $userConnection = Connection::create('user')
            ->setConnectionType(function () {
                return $this->manager->getType('user');
            });
        $schoolsubscriptionsConnection = Connection::create('schoolsubscriptions2')
            ->setConnectionType(function () {
                return $this->manager->getType('schoolSubscriptions');
            });
        return [
            'isTeacher' => ['type' => Type::boolean()],
            'user' => [
                'type' => $userConnection->toType(),
                'args' => $userConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($userConnection) {
                    return $userConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ],
            'schoolSubscriptions' => [
                'type' => $schoolsubscriptionsConnection->toType(),
                'args' => $schoolsubscriptionsConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($schoolsubscriptionsConnection) {
                    return $schoolsubscriptionsConnection->resolveList(
                        $obj->Groups(),
                        $args,
                        $context
                    );
                }
            ],
            'csrf' => ['type' => Type::string()],
            'schoolCourses' => ['type' => Type::boolean()],
            'message' => ['type' => Type::string()],
            'isAcademicForce' => ['type' => Type::boolean()],
            'redirectUrl' => ['type' => Type::string()],
        ];
          
    }
}