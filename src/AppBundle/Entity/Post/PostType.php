<?php

namespace AppBundle\Entity\Post;

use AppBundle\Entity\Comment\CommentType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostType extends AbstractObjectType
{
    /**
     * @param \Youshido\GraphQL\Config\Object\ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields([
            'id'        => new IdType(),
            'title'     => new StringType(),
            'content'   => new StringType(),
            'createdAt' => [
                'type' => new DateTimeType("Y-m-d"),
                'description' => 'Date when post was created'
            ],
            'updatedAt' => new DateTimeType("d M, Y H:ia"),
            'comments'  => new ListType(new CommentType()),
        ]);

        $config->setDescription("Blog post");
    }

}