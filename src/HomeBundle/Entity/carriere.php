<?php

namespace HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * carriere
 *
 * @ORM\Table(name="carriere")
 * @ORM\Entity(repositoryClass="HomeBundle\Repository\carriereRepository")
 */
class carriere
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
     * @ORM\Column(name="titre", type="string")
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;



    /**
     * @var string
     * @ORM\Column(name="description", type="text",  length=65535)
     */
    private $description;


    /**
     * @var string
     * @ORM\Column(name="missions", type="text",  length=65535)
     */
    private $missions;

    /**
     * @var string
     * @ORM\Column(name="profil", type="text",  length=65535)
     */
    private $profil;

    /**
     * @var string
     * @ORM\Column(name="localisation", type="string" )
     */
    private $locatisation;

    /**
     * @var double
     * @ORM\Column(name="salaire", type="integer")
     */
    private $salaire;

    /**
     * @var string
     * @ORM\Column(name="disponnibilite", type="string" )
     */
    private $disponnibilite;






    /**
     * @return string
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param string $missions
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;
    }

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @return string
     */
    public function getPourquoiNous()
    {
        return $this->pourquoi_nous;
    }

    /**
     * @param string $pourquoi_nous
     */
    public function setPourquoiNous($pourquoi_nous)
    {
        $this->pourquoi_nous = $pourquoi_nous;
    }

    /**
     * @return string
     */
    public function getReglement()
    {
        return $this->reglement;
    }

    /**
     * @param string $reglement
     */
    public function setReglement($reglement)
    {
        $this->reglement = $reglement;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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

    /**
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param string $profil
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    }

    /**
     * @return string
     */
    public function getLocatisation()
    {
        return $this->locatisation;
    }

    /**
     * @param string $locatisation
     */
    public function setLocatisation($locatisation)
    {
        $this->locatisation = $locatisation;
    }

    /**
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param float $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * @return string
     */
    public function getDisponnibilite()
    {
        return $this->disponnibilite;
    }

    /**
     * @param string $disponnibilite
     */
    public function setDisponnibilite($disponnibilite)
    {
        $this->disponnibilite = $disponnibilite;
    }

    /**
     * @return string
     */
    public function getTypeContrat()
    {
        return $this->type_contrat;
    }

    /**
     * @param string $type_contrat
     */
    public function setTypeContrat($type_contrat)
    {
        $this->type_contrat = $type_contrat;
    }


    /**
     * @var string
     * @ORM\Column(name="contrat", type="string")
     */
    private $type_contrat;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

