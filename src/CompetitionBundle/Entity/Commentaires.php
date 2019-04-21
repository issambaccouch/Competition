<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="fk_commentaires_users1_idx", columns={"id_user"}), @ORM\Index(name="fk_commentaires_actualites1_idx", columns={"id_actualite"}), @ORM\Index(name="fk_commentaires_competitions1_idx", columns={"id_cmpt"}), @ORM\Index(name="fk_commentaires_evenements1_idx", columns={"id_event"}), @ORM\Index(name="fk_commentaires_offres1_idx", columns={"id_offre"})})
 * @ORM\Entity
 */
class Commentaires
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime", nullable=true)
     */
    private $dateCreate;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=true)
     */
    private $text;

    /**
     * @var \Actualites
     *
     * @ORM\ManyToOne(targetEntity="Actualites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_actualite", referencedColumnName="id_actualite")
     * })
     */
    private $idActualite;

    /**
     * @var \Competitions
     *
     * @ORM\ManyToOne(targetEntity="Competitions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cmpt", referencedColumnName="id_cmpt")
     * })
     */
    private $idCmpt;

    /**
     * @var \Evenements
     *
     * @ORM\ManyToOne(targetEntity="Evenements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     * })
     */
    private $idEvent;

    /**
     * @var \Offres
     *
     * @ORM\ManyToOne(targetEntity="Offres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id_offre")
     * })
     */
    private $idOffre;

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
     * Get idCommt
     *
     * @return integer
     */
    public function getIdCommt()
    {
        return $this->idCommt;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Commentaires
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Commentaires
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set idActualite
     *
     * @param \CompetitionBundle\Entity\Actualites $idActualite
     *
     * @return Commentaires
     */
    public function setIdActualite(\CompetitionBundle\Entity\Actualites $idActualite = null)
    {
        $this->idActualite = $idActualite;

        return $this;
    }

    /**
     * Get idActualite
     *
     * @return \CompetitionBundle\Entity\Actualites
     */
    public function getIdActualite()
    {
        return $this->idActualite;
    }

    /**
     * Set idCmpt
     *
     * @param \CompetitionBundle\Entity\Competitions $idCmpt
     *
     * @return Commentaires
     */
    public function setIdCmpt(\CompetitionBundle\Entity\Competitions $idCmpt = null)
    {
        $this->idCmpt = $idCmpt;

        return $this;
    }

    /**
     * Get idCmpt
     *
     * @return \CompetitionBundle\Entity\Competitions
     */
    public function getIdCmpt()
    {
        return $this->idCmpt;
    }

    /**
     * Set idEvent
     *
     * @param \CompetitionBundle\Entity\Evenements $idEvent
     *
     * @return Commentaires
     */
    public function setIdEvent(\CompetitionBundle\Entity\Evenements $idEvent = null)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return \CompetitionBundle\Entity\Evenements
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set idOffre
     *
     * @param \CompetitionBundle\Entity\Offres $idOffre
     *
     * @return Commentaires
     */
    public function setIdOffre(\CompetitionBundle\Entity\Offres $idOffre = null)
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    /**
     * Get idOffre
     *
     * @return \CompetitionBundle\Entity\Offres
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set idUser
     *
     * @param \CompetitionBundle\Entity\Users $idUser
     *
     * @return Commentaires
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
