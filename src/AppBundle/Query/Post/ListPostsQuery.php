<?php

namespace AppBundle\Query\Post;

use AppBundle\Entity\Post\PostType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class ListPostsQuery extends AbstractContainerAwareField
{
    public function getName()
    {
        return "listPosts";
    }

    public function build(FieldConfig $config)
    {
        $config->set("description", "Liste tous les messages");
    }

    public function resolve($parentEntity, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repository = $em->getRepository(\AppBundle\Entity\Post\Post::class);
        return $repository->findAll();
    }

    public function getType()
    {
        return new ListType(new PostType());
    }
}