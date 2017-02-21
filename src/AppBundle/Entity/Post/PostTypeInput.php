<?php

namespace AppBundle\Entity\Post;

use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostTypeInput extends AbstractInputObjectType
{
    public function build($config)
    {
        $config->addFields([
            'title' => new StringType(),
            'content' => new StringType(),
        ]);
    }
}