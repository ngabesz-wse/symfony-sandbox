<?php

namespace ApiBundle\Mutation\Product;

use Ynlo\GraphQLBundle\Annotation as GraphQL;

/**
 * @GraphQL\ObjectType()
 */
class UpdateProductSkuPayload
{
    /**
     * @var string
     * @GraphQL\Field(type="String")
     */
    protected $sku;

    /**
     * @var int
     * @GraphQL\Field(type="Int")
     */
    protected $stock;
}
