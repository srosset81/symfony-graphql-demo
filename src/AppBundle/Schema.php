<?php

namespace AppBundle;

use AppBundle\Mutation\MutationType;
use AppBundle\Query\QueryType;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config
            ->setQuery(new QueryType())
            ->setMutation(new MutationType());
    }
}