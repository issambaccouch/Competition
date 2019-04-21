<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * dmoffre
 *
 * @ORM\Table(name="dmoffre")
 * @ORM\Entity(repositoryClass="CompetitionBundle\Repository\dmoffreRepository")
 */
class dmoffre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idoffer", type="integer")
     */
    public $idoffer;

    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer")
     */
    public $iduser;


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
     * Set idoffer
     *
     * @param integer $idoffer
     *
     * @return dmoffre
     */
    public function setIdoffer($idoffer)
    {
        $this->idoffer = $idoffer;

        return $this;
    }

    /**
     * Get idoffer
     *
     * @return int
     */
    public function getIdoffer()
    {
        return $this->idoffer;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return dmoffre
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return int
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
