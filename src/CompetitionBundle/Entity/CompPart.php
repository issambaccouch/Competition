<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompPart
 *
 * @ORM\Table(name="comp_part", indexes={@ORM\Index(name="IDX_B967CCFC977523A4", columns={"id_partenaire"}), @ORM\Index(name="IDX_B967CCFCBBAF0F53", columns={"id_cmpt"})})
 * @ORM\Entity
 */
class CompPart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cmpt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCmpt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_partenaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPartenaire;



    /**
     * Set idCmpt
     *
     * @param integer $idCmpt
     *
     * @return CompPart
     */
    public function setIdCmpt($idCmpt)
    {
        $this->idCmpt = $idCmpt;

        return $this;
    }

    /**
     * Get idCmpt
     *
     * @return integer
     */
    public function getIdCmpt()
    {
        return $this->idCmpt;
    }

    /**
     * Set idPartenaire
     *
     * @param integer $idPartenaire
     *
     * @return CompPart
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
