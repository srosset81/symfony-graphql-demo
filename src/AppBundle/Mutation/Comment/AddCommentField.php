<?php

namespace AppBundle\Mutation\Comment;

use AppBundle\Entity\Comment\Comment;
use AppBundle\Entity\Comment\CommentType;
use AppBundle\Entity\Comment\CommentTypeInput;
use Doctrine\ORM\EntityManager;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddCommentField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            "comment" => new NonNullType(new CommentTypeInput()),
        ]);
        
        $config->set("description", "Ajouter un nouveau commentaire");
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();

        $post = $em->getRepository(\AppBundle\Entity\Post\Post::class)->find($args['comment']['post']);
        if(!$post) throw new \Exception("Aucun post trouvé avec cet ID");

        $comment = new Comment();
        $comment->setAuthor($args['comment']['author']);
        $comment->setContent($args['comment']['content']);
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