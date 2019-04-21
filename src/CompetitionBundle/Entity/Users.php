<?php

namespace CompetitionBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})})
 * @ORM\Entity
 */
class Users extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=150, nullable=true)
     */
    protected $nom;


    /**
     * @var string
     *
     * @ORM\Column(name="notecv", type="integer", nullable=true)
     */
    protected $notecv;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=150, nullable=true)
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    protected $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6, nullable=true)
     */
    protected $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=255, nullable=true)
     */
    protected $bio;


    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=12, nullable=true)
     */
    protected $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=true)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=150, nullable=true)
     */
    protected $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codepost", type="string", length=12, nullable=true)
     */
    protected $codepost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creat_date", type="datetime", nullable=true)
     */
    protected $creatDate;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=255, nullable=true)
     */
    protected $media;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    protected $status = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Groupe", mappedBy="idGuuser")
     */
    protected $idGugroup;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Competitions", inversedBy="idUser")
     * @ORM\JoinTable(name="users_cmpt",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_cmpt", referencedColumnName="id_cmpt")
     *   }
     * )
     */
    protected $idCmpt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evenements", inversedBy="idUser")
     * @ORM\JoinTable(name="users_event",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     *   }
     * )
     */
    protected $idEvent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Offres", inversedBy="idUser")
     * @ORM\JoinTable(name="users_offres",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_offre", referencedColumnName="id_offre")
     *   }
     * )
     */
    protected $idOffre;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idGugroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idCmpt = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idEvent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idOffre = new \Doctrine\Common\Collections\ArrayCollection();
    }




    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set notecv
     *
     * @param integer $notecv
     *
     * @return Users
     */
    public function setNotecv($notecv)
    {
        $this->notecv = $notecv;

        return $this;
    }

    /**
     * Get notecv
     *
     * @return integer
     */
    public function getNotecv()
    {
        return $this->notecv;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return Users
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Users
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return Users
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Users
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Users
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Users
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepost
     *
     * @param string $codepost
     *
     * @return Users
     */
    public function setCodepost($codepost)
    {
        $this->codepost = $codepost;

        return $this;
    }

    /**
     * Get codepost
     *
     * @return string
     */
    public function getCodepost()
    {
        return $this->codepost;
    }

    /**
     * Set creatDate
     *
     * @param \DateTime $creatDate
     *
     * @return Users
     */
    public function setCreatDate($creatDate)
    {
        $this->creatDate = $creatDate;

        return $this;
    }

    /**
     * Get creatDate
     *
     * @return \DateTime
     */
    public function getCreatDate()
    {
        return $this->creatDate;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Users
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
     * Set status
     *
     * @param integer $status
     *
     * @return Users
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add idGugroup
     *
     * @param \CompetitionBundle\Entity\Groupe $idGugroup
     *
     * @return Users
     */
    public function addIdGugroup(\CompetitionBundle\Entity\Groupe $idGugroup)
    {
        $this->idGugroup[] = $idGugroup;

        return $this;
    }

    /**
     * Remove idGugroup
     *
     * @param \CompetitionBundle\Entity\Groupe $idGugroup
     */
    public function removeIdGugroup(\CompetitionBundle\Entity\Groupe $idGugroup)
    {
        $this->idGugroup->removeElement($idGugroup);
    }

    /**
     * Get idGugroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdGugroup()
    {
        return $this->idGugroup;
    }

    /**
     * Add idCmpt
     *
     * @param \CompetitionBundle\Entity\Competitions $idCmpt
     *
     * @return Users
     */
    public function addIdCmpt(\CompetitionBundle\Entity\Competitions $idCmpt)
    {
        $this->idCmpt[] = $idCmpt;

        return $this;
    }

    /**
     * Remove idCmpt
     *
     * @param \CompetitionBundle\Entity\Competitions $idCmpt
     */
    public function removeIdCmpt(\CompetitionBundle\Entity\Competitions $idCmpt)
    {
        $this->idCmpt->removeElement($idCmpt);
    }

    /**
     * Get idCmpt
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdCmpt()
    {
        return $this->idCmpt;
    }

    /**
     * Add idEvent
     *
     * @param \CompetitionBundle\Entity\Evenements $idEvent
     *
     * @return Users
     */
    public function addIdEvent(\CompetitionBundle\Entity\Evenements $idEvent)
    {
        $this->idEvent[] = $idEvent;

        return $this;
    }

    /**
     * Remove idEvent
     *
     * @param \CompetitionBundle\Entity\Evenements $idEvent
     */
    public function removeIdEvent(\CompetitionBundle\Entity\Evenements $idEvent)
    {
        $this->idEvent->removeElement($idEvent);
    }

    /**
     * Get idEvent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Add idOffre
     *
     * @param \CompetitionBundle\Entity\Offres $idOffre
     *
     * @return Users
     */
    public function addIdOffre(\CompetitionBundle\Entity\Offres $idOffre)
    {
        $this->idOffre[] = $idOffre;

        return $this;
    }

    /**
     * Remove idOffre
     *
     * @param \CompetitionBundle\Entity\Offres $idOffre
     */
    public function removeIdOffre(\CompetitionBundle\Entity\Offres $idOffre)
    {
        $this->idOffre->removeElement($idOffre);
    }

    /**
     * Get idOffre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }


}
