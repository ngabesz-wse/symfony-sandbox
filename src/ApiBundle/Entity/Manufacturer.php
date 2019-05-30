<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ynlo\GraphQLBundle\Annotation as GraphQL;
use Ynlo\GraphQLBundle\Model\NodeInterface;

/**
 * Manufacturer
 *
 * @ORM\Entity()
 * @ORM\Table(name="manufacturer")
 * @GraphQL\ObjectType()
 * @GraphQL\QueryList(description="Get list of manufacturers")
 * @GraphQL\MutationAdd()
 * @GraphQL\MutationUpdate()
 * @GraphQL\MutationDelete()
 */
class Manufacturer implements NodeInterface
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
     * @ORM\Column(name="name", type="string")
     * @GraphQL\Field(type="String")
     */
    protected $name;

    /**
     * @var Product[]
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Product", mappedBy="manufacturer")
     * @GraphQL\Field(type="ApiBundle\Entity\Product")
     */
    protected $products;

    /**
     * Manufacturer constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $product
     */
    public function addProduct($product)
    {
        $this->products->add($product);
    }
}
