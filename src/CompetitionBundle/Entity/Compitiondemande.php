<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compitiondemande
 *
 * @ORM\Table(name="compitiondemande")
 * @ORM\Entity(repositoryClass="CompetitionBundle\Repository\CompitiondemandeRepository")
 */
class Compitiondemande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="$idcompt", type="integer", length=255, nullable=false)
     */
    private $idcompt;

    /**
     * @var integer
     *
     * @ORM\Column(name="$iduser", type="integer", nullable=false)
     */
    private $iduser;


    /**
     * @var string
     *
     * @ORM\Column(name="admindecision", type="string", length=255, nullable=true)
     */
    private $admindecision;

    /**
     * @var string
     *
     * @ORM\Column(name="usercv", type="string", length=255, nullable=true)
     */
    private $usercv;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="competitiontitre", type="string", length=255, nullable=true)
     */
    private $competitiontitre;


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
     * Set idcompt
     *
     * @param integer $idcompt
     *
     * @return Compitiondemande
     */
    public function setIdcompt($idcompt)
    {
        $this->idcompt = $idcompt;

        return $this;
    }

    /**
     * Get idcompt
     *
     * @return integer
     */
    public function getIdcompt()
    {
        return $this->idcompt;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Compitiondemande
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set admindecision
     *
     * @param string $admindecision
     *
     * @return Compitiondemande
     */
    public function setAdmindecision($admindecision)
    {
        $this->admindecision = $admindecision;

        return $this;
    }

    /**
     * Get admindecision
     *
     * @return string
     */
    public function getAdmindecision()
    {
        return $this->admindecision;
    }

    /**
     * Set usercv
     *
     * @param string $usercv
     *
     * @return Compitiondemande
     */
    public function setUsercv($usercv)
    {
        $this->usercv = $usercv;

        return $this;
    }

    /**
     * Get usercv
     *
     * @return string
     */
    public function getUsercv()
    {
        return $this->usercv;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Compitiondemande
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set competitiontitre
     *
     * @param string $competitiontitre
     *
     * @return Compitiondemande
     */
    public function setCompetitiontitre($competitiontitre)
    {
        $this->competitiontitre = $competitiontitre;

        return $this;
    }

    /**
     * Get competitiontitre
     *
     * @return string
     */
    public function getCompetitiontitre()
    {
        return $this->competitiontitre;
    }
}
