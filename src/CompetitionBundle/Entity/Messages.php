<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="fk_messages_users_idx", columns={"envoyeur"}), @ORM\Index(name="fk_messages_users1_idx", columns={"recepteur"})})
 * @ORM\Entity
 */
class Messages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_msg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMsg;

    /**
     * @var integer
     *
     * @ORM\Column(name="envoyeur", type="integer", nullable=true)
     */
    private $envoyeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="recepteur", type="integer", nullable=true)
     */
    private $recepteur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="datetime", nullable=true)
     */
    private $dateEnvoi;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;



    /**
     * Get idMsg
     *
     * @return integer
     */
    public function getIdMsg()
    {
        return $this->idMsg;
    }

    /**
     * Set envoyeur
     *
     * @param integer $envoyeur
     *
     * @return Messages
     */
    public function setEnvoyeur($envoyeur)
    {
        $this->envoyeur = $envoyeur;

        return $this;
    }

    /**
     * Get envoyeur
     *
     * @return integer
     */
    public function getEnvoyeur()
    {
        return $this->envoyeur;
    }

    /**
     * Set recepteur
     *
     * @param integer $recepteur
     *
     * @return Messages
     */
    public function setRecepteur($recepteur)
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    /**
     * Get recepteur
     *
     * @return integer
     */
    public function getRecepteur()
    {
        return $this->recepteur;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Messages
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     *
     * @return Messages
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Messages
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}
