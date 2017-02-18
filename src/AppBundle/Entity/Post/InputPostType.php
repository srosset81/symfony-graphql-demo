<?php
/**
 * Created by PhpStorm.
 * User: mounter
 * Date: 2/18/17
 * Time: 12:11 PM
 */

namespace AppBundle\Entity\Post;


use Youshido\GraphQL\Config\Object\InputObjectTypeConfig;
use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class InputPostType extends AbstractInputObjectType
{
    public function build($config)
    {
        $config->addFields([
            'title'   => new StringType(),
            'content' => new StringType(),
        ]);
    }


}