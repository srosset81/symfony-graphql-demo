<?php

namespace AppBundle\Entity\Comment;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CommentType extends AbstractObjectType 
{
    /**
     * @param \Youshido\GraphQL\Config\Object\ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config
            ->addField('id', new IdType())
            ->addField('author', new StringType())
            ->addField('content', new StringType())
        ;
        
        $config->setDescription("Commentaire");
    }
}