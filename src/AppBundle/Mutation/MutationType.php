<?php

namespace AppBundle\Mutation;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class MutationType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new \AppBundle\Mutation\Comment\AddCommentMutation(),
            new \AppBundle\Mutation\Post\AddPostMutation(),
        ]);
    }
}