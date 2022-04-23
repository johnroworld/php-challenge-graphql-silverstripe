<?php
namespace MyProject\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\MutationCreator;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\Security\Member;

use MyProject\DataObjects\Body;

class CreateBodyMutationCreator extends MutationCreator implements OperationResolver {
    public function attributes()
    {
        return [
            'name' => 'createBody',
            'description' => 'Creates a body without permissions or group assignments'
        ];
    }

    public function type()
    {
        return $this->manager->getType('Body');
    }

    public function args()
    {
        return [
            'label' => ['type' => Type::nonNull(Type::string())],
            'url' => ['type' => Type::string()],
            'type' => ['type' => Type::string()],
        ];
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        if (!singleton(Body::class)->canCreate($context['currentBody'])) {
            throw new \InvalidArgumentException('Body creation not allowed');
        }

        $createBody = new Body($args);
        $createBody->write();
        $list = Body::get();
        return $list;
    }
}