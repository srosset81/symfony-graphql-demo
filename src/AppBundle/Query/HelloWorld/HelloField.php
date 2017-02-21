<?php

namespace AppBundle\Query\HelloWorld;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class HelloField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->setDescription("Permet de tester que l'API fonctionne bien.");
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