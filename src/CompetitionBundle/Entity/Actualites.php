<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actualites
 *
 * @ORM\Table(name="actualites", indexes={@ORM\Index(name="fk_actualites_users1_idx", columns={"id_user"}), @ORM\Index(name="fk_actualites_partenaires1_idx", columns={"id_partenaire"})})
 * @ORM\Entity
 */
class Actualites
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actualite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="alert", type="integer", nullable=true)
     */
    private $alert;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    private $media;

    /**
     * @var \Partenaires
     *
     * @ORM\ManyToOne(targetEntity="Partenaires")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_partenaire", referencedColumnName="id_partenaire")
     * })
     */
    private $idPartenaire;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;



    /**
     * Get idActualite
     *
     * @return integer
     */
    public function getIdActualite()
    {
        return $this->idActualite;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Actualites
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
     * Set description
     *
     * @param string $description
     *
     * @return Actualites
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Actualites
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set alert
     *
     * @param integer $alert
     *
     * @return Actualites
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return integer
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Actualites
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set idPartenaire
     *
     * @param \CompetitionBundle\Entity\Partenaires $idPartenaire
     *
     * @return Actualites
     */
    public function setIdPartenaire(\CompetitionBundle\Entity\Partenaires $idPartenaire = null)
    {
        $this->idPartenaire = $idPartenaire;

        return $this;
    }

    /**
     * Get idPartenaire
     *
     * @return \CompetitionBundle\Entity\Partenaires
     */
    public function getIdPartenaire()
    {
        return $this->idPartenaire;
    }

    /**
     * Set idUser
     *
     * @param \CompetitionBundle\Entity\Users $idUser
     *
     * @return Actualites
     */
    public function setIdUser(\CompetitionBundle\Entity\Users $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \CompetitionBundle\Entity\Users
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
