<?php

namespace AppBundle\Query\HelloWorld;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class HelloWorldQuery extends AbstractContainerAwareField
{
    public function getName()
    {
        return "hello";
    }

    public function build(FieldConfig $config)
    {
        $config->set("description", "Permet de tester que l'API fonctionne bien.");
    }

    public function resolve($parent, array $args, ResolveInfo $info)
    {
        return "World";
    }

    public function getType()
    {
        return new StringType();
    }
}