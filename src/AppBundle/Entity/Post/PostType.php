<?php

namespace AppBundle\Entity\Post;

use AppBundle\Entity\Comment\CommentType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostType extends AbstractObjectType 
{
    /**
     * @param \Youshido\GraphQL\Config\Object\ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config
            ->addField('id', new IdType())
            ->addField('title', new StringType())
            ->addField('content', new StringType())
            ->addField('comments', new ListType(new CommentType()))
        ;
        
        $config->set("description", "Blog post");
    }
}