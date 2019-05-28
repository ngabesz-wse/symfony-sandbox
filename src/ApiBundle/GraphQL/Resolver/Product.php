<?php
/**
 * Created by PhpStorm.
 * User: gabornagy
 * Date: 2019. 05. 15.
 * Time: 14:15
 */

namespace ApiBundle\GraphQL\Resolver;

use Doctrine\Common\Persistence\ManagerRegistry;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use ApiBundle\Entity\Product as ProductEntity;

class Product implements ResolverInterface
{

    protected $em;

    public function __construct(ManagerRegistry $em)
    {
        $this->em = $em;
    }

    public function id(ProductEntity $product)
    {
        return $product->getId();
    }

    public function stock(ProductEntity $product)
    {
        return $product->getStock();
    }

    public function sku(ProductEntity $product)
    {
        return $product->getSku();
    }

    public function resolve($id)
    {
        return $this->em->getRepository(ProductEntity::class)->find($id);
    }

    public function resolveProductFields($info, $value, $args)
    {
        $method = $info->fieldName;
        return $this->{$method}($value, $args);
    }

    public function findAll()
    {
        return $this->em->getRepository(ProductEntity::class)->findAll();
    }

}