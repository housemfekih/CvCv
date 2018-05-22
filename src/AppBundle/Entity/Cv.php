<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cv
 *
 * @ORM\Table(name="cv")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CvRepository")
 */
class Cv
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
     * @ORM\Column(name="nomCv", type="string", length=255)
     */
    private $nomCv;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Template",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $templateID;

    /**
     * @var string
     *
     * @ORM\Column(name="fichierCv", type="text")
     */
    private $fichierCv;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuCv", type="text")
     */
    private $contenuCv;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userID;


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
     * Set nomCv
     *
     * @param string $nomCv
     *
     * @return Cv
     */
    public function setNomCv($nomCv)
    {
        $this->nomCv = $nomCv;

        return $this;
    }

    /**
     * Get nomCv
     *
     * @return string
     */
    public function getNomCv()
    {
        return $this->nomCv;
    }

    /**
     * Set templateID
     *
     * @param integer $templateID
     *
     * @return Cv
     */
    public function setTemplateID($templateID)
    {
        $this->templateID = $templateID;

        return $this;
    }

    /**
     * Get templateID
     *
     * @return int
     */
    public function getTemplateID()
    {
        return $this->templateID;
    }

    /**
     * Set fichierCv
     *
     * @param string $fichierCv
     *
     * @return Cv
     */
    public function setFichierCv($fichierCv)
    {
        $this->fichierCv = $fichierCv;

        return $this;
    }

    /**
     * Get fichierCv
     *
     * @return string
     */
    public function getFichierCv()
    {
        return $this->fichierCv;
    }

    /**
     * Set contenuCv
     *
     * @param string $contenuCv
     *
     * @return Cv
     */
    public function setContenuCv($contenuCv)
    {
        $this->contenuCv = $contenuCv;

        return $this;
    }

    /**
     * Get contenuCv
     *
     * @return string
     */
    public function getContenuCv()
    {
        return $this->contenuCv;
    }

    /**
     * Set userID
     *
     * @param integer $userID
     *
     * @return Cv
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    /**
     * Get userID
     *
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }
}
