<?php

namespace AppBundle\Mutation\Post;

use AppBundle\Entity\Post\Post;
use AppBundle\Entity\Post\PostType;
use Doctrine\ORM\EntityManager;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddPostMutation extends AbstractContainerAwareField
{
    public function getName()
    {
        return "addPost";
    }

    public function build(FieldConfig $config)
    {
        $config->addArgument("title", new NonNullType(new StringType()));
        $config->addArgument("content", new NonNullType(new StringType()));

        $config->set("description", "Ajouter un nouveau post");
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        $post = new Post();
        $post->setTitle($args['title']);
        $post->setContent($args['content']);
        
        $em->persist($post);
        $em->flush();

        return $post;
    }

    public function getType()
    {
        return new PostType();
    }
}