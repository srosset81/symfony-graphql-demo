<?
namespace AppBundle\Query;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new \AppBundle\Query\HelloWorld\HelloWorldQuery(),
            new \AppBundle\Query\Post\ListPostsQuery(),
            new \AppBundle\Query\Post\GetPostQuery(),
        ]);
    }
}