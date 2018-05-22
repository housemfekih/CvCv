<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupeRepository")
 */
class Groupe
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
     * @ORM\Column(name="nomGroupe", type="string", length=255)
     */
    private $nomGroupe;

    /**
        * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Section", cascade={"persist"})
        * @ORM\JoinTable(name="sectionsGroupeRel")  
        */
    private $sectionsGroupeRel;
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
     * Set nomGroupe
     *
     * @param string $nomGroupe
     *
     * @return Groupe
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    /**
     * Get nomGroupe
     *
     * @return string
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sectionsGroupeRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sectionsGroupeRel
     *
     * @param \AppBundle\Entity\Section $sectionsGroupeRel
     *
     * @return Groupe
     */
    public function addSectionsGroupeRel(\AppBundle\Entity\Section $sectionsGroupeRel)
    {
        $this->sectionsGroupeRel[] = $sectionsGroupeRel;

        return $this;
    }

    /**
     * Remove sectionsGroupeRel
     *
     * @param \AppBundle\Entity\Section $sectionsGroupeRel
     */
    public function removeSectionsGroupeRel(\AppBundle\Entity\Section $sectionsGroupeRel)
    {
        $this->sectionsGroupeRel->removeElement($sectionsGroupeRel);
    }

    /**
     * Get sectionsGroupeRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSectionsGroupeRel()
    {
        return $this->sectionsGroupeRel;
    }
}
