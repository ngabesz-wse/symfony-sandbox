<?php

namespace ApiBundle\Query\Product;

use ApiBundle\Entity\Product as ProductEntity;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Ynlo\GraphQLBundle\Annotation as GraphQL;

/**
 * @GraphQL\Query(description="Get product by sku...")
 * @GraphQL\Argument(name="sku", type="String!")
 */
class GetProductBySku implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param string $sku
     * @return object|null
     */
    public function __invoke($sku)
    {
        return $this->container
            ->get('doctrine')
            ->getRepository(ProductEntity::class)
            ->findOneBy(['sku' => $sku])
        ;
    }
}
