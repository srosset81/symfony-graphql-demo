<?php

namespace AppBundle;

use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config
            ->setQuery(new \AppBundle\Query\QueryType())
            ->setMutation(new \AppBundle\Mutation\MutationType());
    }
}

