<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupUsers
 *
 * @ORM\Table(name="group_users", indexes={@ORM\Index(name="IDX_44AF8E8ED98C6774", columns={"id_GUuser"}), @ORM\Index(name="IDX_44AF8E8E35FC1765", columns={"id_GUgroup"})})
 * @ORM\Entity
 */
class GroupUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_GUgroup", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idGugroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_GUuser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idGuuser;



    /**
     * Set idGugroup
     *
     * @param integer $idGugroup
     *
     * @return GroupUsers
     */
    public function setIdGugroup($idGugroup)
    {
        $this->idGugroup = $idGugroup;

        return $this;
    }

    /**
     * Get idGugroup
     *
     * @return integer
     */
    public function getIdGugroup()
    {
        return $this->idGugroup;
    }

    /**
     * Set idGuuser
     *
     * @param integer $idGuuser
     *
     * @return GroupUsers
     */
    public function setIdGuuser($idGuuser)
    {
        $this->idGuuser = $idGuuser;

        return $this;
    }

    /**
     * Get idGuuser
     *
     * @return integer
     */
    public function getIdGuuser()
    {
        return $this->idGuuser;
    }
}
