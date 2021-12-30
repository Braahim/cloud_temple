<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * actualite
 *
 * @ORM\Table(name="actualite")
 * @ORM\Entity(repositoryClass="HomeBundle\Repository\actualiteRepository")
 */
class actualite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title1", type="string", length=255)
     */
    private $sub_title1;
    /**
     * @var string
     *
     * @ORM\Column(name="title2", type="string", length=255)
     */
    private $sub_title2;

    /**
     * @return string
     */
    public function getSubTitle2()
    {
        return $this->sub_title2;
    }

    /**
     * @param string $sub_title2
     */
    public function setSubTitle2($sub_title2)
    {
        $this->sub_title2 = $sub_title2;
    }

    /**
     * @return string
     */
    public function getSubTitle3()
    {
        return $this->sub_title3;
    }

    /**
     * @param string $sub_title3
     */
    public function setSubTitle3($sub_title3)
    {
        $this->sub_title3 = $sub_title3;
    }

    /**
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param string $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return string
     */
    public function getSubject2()
    {
        return $this->subject2;
    }

    /**
     * @param string $subject2
     */
    public function setSubject2($subject2)
    {
        $this->subject2 = $subject2;
    }

    /**
     * @return string
     */
    public function getSubject3()
    {
        return $this->subject3;
    }

    /**
     * @param string $subject3
     */
    public function setSubject3($subject3)
    {
        $this->subject3 = $subject3;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="title3", type="string", length=255)
     */
    private $sub_title3;

    /**
     * @var string
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png" , "image/tiff" , "image/svg+xml"})
     * @Assert\NotBlank(message="plz enter an image")
     * @Assert\Image()
     * @ORM\Column(name="photo",type="string",length=255,nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="text",  length=65535)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="meta", type="text",  length=65535)
     */
    private $meta;

    /**
     * @var string
     *
     * @ORM\Column(name="subject2", type="text",  length=65535)
     */
    private $subject2;

    /**
     * @var string
     *
     * @ORM\Column(name="subject3", type="text",  length=65535)
     */
    private $subject3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @return string
     */
    public function getSubTitle1()
    {
        return $this->sub_title1;
    }

    /**
     * @param string $sub_title1
     */
    public function setSubTitle1($sub_title1)
    {
        $this->sub_title1 = $sub_title1;
    }

    /**
     * actualite constructor.
     *
     */
    public function __construct()
    {
        $this->setDateCreation(new \DateTime());
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
     * Set title
     *
     * @param string $title
     *
     * @return actualite
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return actualite
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return actualite
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

}
