<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventPart
 *
 * @ORM\Table(name="event_part", indexes={@ORM\Index(name="IDX_56C43C6D977523A4", columns={"id_partenaire"}), @ORM\Index(name="IDX_56C43C6DD52B4B97", columns={"id_event"})})
 * @ORM\Entity
 */
class EventPart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idEvent;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_partenaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPartenaire;



    /**
     * Set idEvent
     *
     * @param integer $idEvent
     *
     * @return EventPart
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return integer
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set idPartenaire
     *
     * @param integer $idPartenaire
     *
     * @return EventPart
     */
    public function setIdPartenaire($idPartenaire)
    {
        $this->idPartenaire = $idPartenaire;

        return $this;
    }

    /**
     * Get idPartenaire
     *
     * @return integer
     */
    public function getIdPartenaire()
    {
        return $this->idPartenaire;
    }
}
