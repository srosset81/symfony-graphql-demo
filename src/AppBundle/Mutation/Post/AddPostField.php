<?php

namespace AppBundle\Mutation\Post;

use AppBundle\Entity\Post\Post;
use AppBundle\Entity\Post\PostType;
use AppBundle\Entity\Post\PostTypeInput;
use Doctrine\ORM\EntityManager;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddPostField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            "post" => new NonNullType(new PostTypeInput()),
        ]);

        $config->setDescription("Ajouter un nouveau post");
    }

    public function resolve($parent, array $args, ResolveInfo $info)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        $post = new Post();
        $post->setTitle($args['post']['title']);
        $post->setContent($args['post']['content']);

        $em->persist($post);
        $em->flush();

        return $post;
    }

    public function getType()
    {
        return new PostType();
    }
}