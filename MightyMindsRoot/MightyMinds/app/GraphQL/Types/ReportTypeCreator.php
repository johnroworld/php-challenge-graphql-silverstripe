<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

class ReportTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'Report'
        ];
    }

    public function fields()
    {   
        $dataConnection = Connection::create('Report_Data')
            ->setConnectionType(function () {
                return $this->manager->getType('Data');
            });
        return [
            'Title' => ['type' => Type::string()],
            'Data' => [
                'type' => $dataConnection->toType(),
                'args' => $dataConnection->args(),
                'resolve' => function ($obj, $args, $context) use ($dataConnection) {
                    return $dataConnection->resolveList(
                        $obj->Data(),
                        $args,
                        $context
                    );
                }
            ]
        ];
          
    }
}