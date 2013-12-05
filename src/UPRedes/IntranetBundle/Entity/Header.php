<?php

namespace UPRedes\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\AdminBundle\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Header
 *
 * @ORM\Table(name="header")
 * @ORM\Entity(repositoryClass="UPRedes\IntranetBundle\Entity\HeaderRepository")
 */
class Header
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\Length(
     *      max = "32",
     *      maxMessage = "The name cannot be longer than {{ limit }} characters length"
     * )
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @var string
     * @Assert\Length(
     *      max = "128",
     *      maxMessage = "The description cannot be longer than {{ limit }} characters length"
     * )
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    private $image;

    /**
     * @var string
     * @Assert\Url()
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var boolean
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param Application\Sonata\MediaBundle\Entity\Media $image
     * @return Link
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Header
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

}
