<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="section")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SectionRepository")
 */
class Section
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
     * @ORM\Column(name="nomSection", type="string", length=255)
     */
    private $nomSection;



    /**
  * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Champ", cascade={"persist"})
* @ORM\JoinTable(name="sectionChampsRel")  
*/
   private $sectionChampsRel;


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
     * Set nomSection
     *
     * @param string $nomSection
     *
     * @return Section
     */
    public function setNomSection($nomSection)
    {
        $this->nomSection = $nomSection;

        return $this;
    }

    /**
     * Get nomSection
     *
     * @return string
     */
    public function getNomSection()
    {
        return $this->nomSection;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sectionChampsRel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sectionChampsRel
     *
     * @param \AppBundle\Entity\Champ $sectionChampsRel
     *
     * @return Section
     */
    public function addSectionChampsRel(\AppBundle\Entity\Champ $sectionChampsRel)
    {
        $this->sectionChampsRel[] = $sectionChampsRel;

        return $this;
    }

    /**
     * Remove sectionChampsRel
     *
     * @param \AppBundle\Entity\Champ $sectionChampsRel
     */
    public function removeSectionChampsRel(\AppBundle\Entity\Champ $sectionChampsRel)
    {
        $this->sectionChampsRel->removeElement($sectionChampsRel);
    }

    /**
     * Get sectionChampsRel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSectionChampsRel()
    {
        return $this->sectionChampsRel;
    }
}
