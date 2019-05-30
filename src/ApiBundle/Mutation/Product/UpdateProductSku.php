<?php

namespace ApiBundle\Mutation\Product;

use ApiBundle\Entity\Product as ProductEntity;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Ynlo\GraphQLBundle\Annotation as GraphQL;

/**
 * @GraphQL\Mutation()
 * @GraphQL\Argument(name="id", type="Int!")
 * @GraphQL\Argument(name="sku", type="String!")
 */
class UpdateProductSku implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param int $id
     * @param string $sku
     * @return object|null
     */
    public function __invoke($id, $sku)
    {
        return $this->container
            ->get('doctrine')
            ->getRepository(ProductEntity::class)
            ->findOneBy(['sku' => $id])
        ;
    }
}
