<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ynlo\GraphQLBundle\Annotation as GraphQL;
use Ynlo\GraphQLBundle\Model\NodeInterface;

/**
 * ProductDescription
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_description", indexes={@ORM\Index(name="name", columns={"name"})})
 * @GraphQL\ObjectType()
 * @GraphQL\QueryList(name="description", description="Get list of product description")
 */
class ProductDescription implements NodeInterface
{
    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Product", inversedBy="descriptions")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", onDelete="CASCADE")
     * @ORM\Id
     * @GraphQL\Field(type="ApiBundle\Entity\Product")
     */
    protected $product;

    /**
     * @var Language
     *
     * @ORM\ManyToOne(targetEntity="Language")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     * @ORM\Id
     * @GraphQL\Field(type="ApiBundle\Entity\Language")
     */
    protected $language;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @GraphQL\Field(type="String!")
     */
    protected $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     * @GraphQL\Field(type="String!")
     */
    protected $description = '';

    /**
     * @GraphQL\Field(type="ID!")
     *
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param Language $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
