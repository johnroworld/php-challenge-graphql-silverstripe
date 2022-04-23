<?php

namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;

use MyProject\DataObjects\Report;

class ReportQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'Report'
        ];
    }

    

    public function type()
    {
        return Type::listOf($this->manager->getType('Report'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $report = Report::singleton();
        if (!$report->canView($context['currentUser'])) {
            throw new \InvalidArgumentException(sprintf(
                '%s view access not permitted',
                Report::class
            ));
        }
        $list = Report::get();

      
        return $list;
    }
}