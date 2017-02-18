<?php

namespace AppBundle\Mutation;

use AppBundle\Mutation\Comment\AddCommentMutation;
use AppBundle\Mutation\Post\AddPostField;
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
            'addComment' => new AddCommentMutation(),
            'addPost'    => new AddPostField(),
        ]);
    }
}