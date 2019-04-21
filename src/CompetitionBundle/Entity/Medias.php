<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medias
 *
 * @ORM\Table(name="medias", indexes={@ORM\Index(name="fk_medias_users1_idx", columns={"id_user"})})
 * @ORM\Entity
 */
class Medias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_media", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime", nullable=true)
     */
    private $dateCreate;



    /**
     * Get idMedia
     *
     * @return integer
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Medias
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Medias
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Medias
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Medias
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
}
