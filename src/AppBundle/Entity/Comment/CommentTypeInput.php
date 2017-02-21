<?php

namespace AppBundle\Entity\Comment;

use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CommentTypeInput extends AbstractInputObjectType
{
    /**
     * @param \Youshido\GraphQL\Config\Object\ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields([
            'author' => new StringType(),
            'content' => new StringType(),
            'post' => new IdType()
        ]);
    }
}