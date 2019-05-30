<?php

namespace ApiBundle\Query\Product;

use ApiBundle\Entity\Product as ProductEntity;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Ynlo\GraphQLBundle\Annotation as GraphQL;

/**
 * @GraphQL\Query(description="Get product by sku...")
 * @GraphQL\Argument(name="id", type="Int")
 * @GraphQL\Argument(name="sku", type="String")
 * @GraphQL\Argument(name="stock", type="Int")
 */
class FindBy implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @return object|null
     */
    public function __invoke($id)
    {
        // $args = func_get_args();

        return $this->container
            ->get('doctrine')
            ->getRepository(ProductEntity::class)
            ->findOneBy(['id' => $id])
        ;
    }
}
