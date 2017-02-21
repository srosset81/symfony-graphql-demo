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
            'id' => new IdType(),
            'title' => [
                'type' => new StringType(),
                'description' => "Titre"
            ],
            'content' => [
                'type' => new StringType(),
                'description' => "Contenu"
            ],
            'createdAt' => [
                'type' => new DateTimeType("Y-m-d"),
                'description' => "Date d'ajout"
            ],
            'updatedAt' => [
                'type' => new DateTimeType("Y-m-d"),
                'description' => "Dernière mise à jour"
            ],
            'comments' => [
                'type' => new ListType(new CommentType()),
                'description' => "Commentaires liés"
            ],
        ]);

        $config->setDescription("Blog post");
    }

}