<?php

namespace AppBundle\Mutation\Comment;

use AppBundle\Entity\Comment\Comment;
use AppBundle\Entity\Comment\CommentType;
use Doctrine\ORM\EntityManager;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddCommentMutation extends AbstractContainerAwareField
{
    public function getName()
    {
        return "addComment";
    }

    public function build(FieldConfig $config)
    {
        $config->addArgument("post", new NonNullType(new IdType()));
        $config->addArgument("author", new NonNullType(new StringType()));
        $config->addArgument("content", new NonNullType(new StringType()));

        $config->set("description", "Ajouter un nouveau commentaire");
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        $post = $em->getRepository(\AppBundle\Entity\Post\Post::class)->find($args['post']);
        if(!$post) throw new \Exception("Aucun post trouvé avec cet ID");

        $comment = new Comment();
        $comment->setAuthor($args['author']);
        $comment->setContent($args['content']);
        $comment->setPost($post);
        
        $em->persist($comment);
        $em->flush();

        return $comment;
    }

    public function getType()
    {
        return new CommentType();
    }
}