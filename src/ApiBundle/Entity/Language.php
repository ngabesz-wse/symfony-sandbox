<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ynlo\GraphQLBundle\Annotation as GraphQL;
use Ynlo\GraphQLBundle\Model\NodeInterface;

/**
 * Language
 *
 * @ORM\Entity()
 * @ORM\Table(name="language", indexes={@ORM\Index(name="name", columns={"name"})})
 * @GraphQL\ObjectType()
 * @GraphQL\QueryList(description="Get list of languages")
 */
class Language implements NodeInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", columnDefinition="INT(11) NOT NULL AUTO_INCREMENT")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @GraphQL\Field(type="ID!")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     * @GraphQL\Field(type="String!")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255, nullable=false)
     * @GraphQL\Field(type="String!")
     */
    protected $locale;

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
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}
