<?php

namespace AppBundle\Query\Post;

use AppBundle\Entity\Post\Post;
use AppBundle\Entity\Post\PostType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class PostField extends AbstractContainerAwareField
{

    public function build(FieldConfig $config)
    {
        $config->addArgument("id", new NonNullType(new IdType()));

        $config->setDescription("Retourne un seul message");
    }

    public function resolve($parent, array $args, ResolveInfo $info)
    {
        $em = $this->container->get('doctrine')->getManager();
        $repository = $em->getRepository(Post::class);

        return $repository->find($args['id']);
    }

    public function getType()
    {
        return new PostType();
    }
}