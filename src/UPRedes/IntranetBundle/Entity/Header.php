<?php

namespace UPRedes\IntranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Header
 *
 * @ORM\Table(name="header")
 * @ORM\Entity(repositoryClass="UPRedes\IntranetBundle\Entity\HeaderRepository")
 * @Vich\Uploadable
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="header_image_desktop", fileNameProperty="desktopName")
     *
     * @var File
     */
    private $desktopFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $desktopName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="header_image_mobile", fileNameProperty="mobileName")
     *
     * @var File
     */
    private $mobileFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $mobileName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

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

    /**
     * @return File
     */
    public function getDesktopFile()
    {
        return $this->desktopFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $desktopFile
     */
    public function setDesktopFile(File $desktopFile = null)
    {
        $this->desktopFile = $desktopFile;

        if($desktopFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return string
     */
    public function getDesktopName()
    {
        return $this->desktopName;
    }

    /**
     * @param string $desktopName
     */
    public function setDesktopName($desktopName)
    {
        $this->desktopName = $desktopName;
    }

    /**
     * @return File
     */
    public function getMobileFile()
    {
        return $this->mobileFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $mobileFile
     */
    public function setMobileFile(File $mobileFile = null)
    {
        $this->mobileFile = $mobileFile;

        if($mobileFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return string
     */
    public function getMobileName()
    {
        return $this->mobileName;
    }

    /**
     * @param string $mobileName
     */
    public function setMobileName($mobileName)
    {
        $this->mobileName = $mobileName;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }



}
