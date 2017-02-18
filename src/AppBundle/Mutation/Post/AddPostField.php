<?php

namespace AppBundle\Mutation\Post;

use AppBundle\Entity\Post\InputPostType;
use AppBundle\Entity\Post\Post;
use AppBundle\Entity\Post\PostType;
use Doctrine\ORM\EntityManager;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddPostField extends AbstractContainerAwareField
{

    public function build(FieldConfig $config)
    {
        $config->addArguments([
            "post" => [
                'type' => new NonNullType(new InputPostType()),
                'description' => 'Full post body',
            ]
        ]);

        $config->setDescription("Ajouter un nouveau post");
    }

    public function resolve($value, array $args, ResolveInfo $info)
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