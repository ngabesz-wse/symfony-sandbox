<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ynlo\GraphQLBundle\Annotation as GraphQL;
use Ynlo\GraphQLBundle\Model\NodeInterface;

/**
 * Product
 *
 * @ORM\Entity()
 * @ORM\Table(name="product")
 * @GraphQL\ObjectType()
 * @GraphQL\QueryList(description="Get list of products")
 * @GraphQL\MutationAdd()
 * @GraphQL\MutationUpdate()
 * @GraphQL\MutationDelete()
 */
class Product implements NodeInterface
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @GraphQL\Field(type="ID")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string")
     * @GraphQL\Field(type="String")
     */
    protected $sku;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     * @GraphQL\Field(type="Int")
     */
    protected $stock;

    /**
     * @var Manufacturer
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Manufacturer", inversedBy="products")
     * @GraphQL\Field(type="ApiBundle\Entity\Manufacturer")
     */
    protected $manufacturer;

    /**
     * @var ProductDescription[]
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\ProductDescription", mappedBy="product")
     */
    protected $descriptions;

    /**
     * Manufacturer constructor.
     */
    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @return Manufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param Manufacturer $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return ProductDescription[]
     * @GraphQL\Field(type="[ApiBundle\Entity\ProductDescription]")
     * @GraphQL\Argument(name="language", type="String")
     * @GraphQL\Argument(name="name", type="String")
     */
    public function getDescriptions($language = '', $name = '')
    {
        return $this->descriptions;
    }

    /**
     * @param ProductDescription $description
     */
    public function addDescription($description)
    {
        $this->descriptions->add($description);
    }
}
