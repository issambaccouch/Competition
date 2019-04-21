<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moderateurs
 *
 * @ORM\Table(name="moderateurs")
 * @ORM\Entity
 */
class Moderateurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_moderateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModerateur;



    /**
     * Get idModerateur
     *
     * @return integer
     */
    public function getIdModerateur()
    {
        return $this->idModerateur;
    }
}
