<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;



/**
 * Cvs
 *
 * @ORM\Table(name="cvs", uniqueConstraints={@ORM\UniqueConstraint(name="Offres", columns={"id_offre"})})
 * @ORM\Entity
 */
class Cvs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idCv;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    public $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    public $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    public $dateNaissance;

    /**
     * @AssertPhoneNumber
     */
    public $telphoneMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=30, nullable=false)
     */
    public $pays;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=false)
     */
    public $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=30, nullable=false)
     */
    public $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="string", length=255, nullable=true)
     */
    public $photos;

    /**
     * @Assert\File(maxSize="500k")
     */
    public $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */

    public  $description;

    /**
     * @var \Offres
     *
     * @ORM\ManyToOne(targetEntity="Offres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id_offre")
     * })
     */
    public $idOffre;

    /**
     * Get idCv
     *
     * @return integer
     */
    public function getIdCv()
    {
        return $this->idCv;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Cvs
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Cvs
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Cvs
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }



    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Cvs
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Cvs
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     *
     * @return Cvs
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    public function getWebPath(){
        return null===$this->photos ? null : $this->getUploadDir();
    }
    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function uploadProfilePicture(){
        $this->photo->move($this->getUploadRootDir(), $this->photo->getClientOriginalName());
        $this->photos=$this->photo->getClientOriginalName();
        $this->photo=null;
    }

    /**
     * Set photos
     *
     * @param string $photos
     *
     * @return Cvs
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return string
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cvs
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idOffre
     *
     * @param \CompetitionBundle\Entity\Offres $idOffre
     *
     * @return Cvs
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
     * Set user
     *
     * @param integer $user
     *
     * @return Cvs
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }


}
