<?php

namespace CompetitionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offres
 *
 * @ORM\Table(name="offres", indexes={@ORM\Index(name="fk_offres_partenaires1_idx", columns={"id_partenaire"}), @ORM\Index(name="fk_offres_admins1_idx", columns={"id_admin"})})
 * @ORM\Entity
 */
class Offres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idOffre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=true)
     */
    public $idAdmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_partenaire", type="integer", nullable=true)
     */
    public $idPartenaire;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    public $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    public $type;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, nullable=true)
     */
    public $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime", nullable=true)
     */
    public $dateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    public $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=45, nullable=true)
     */
    public $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=150, nullable=true)
     */
    public $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="code_post", type="string", length=12, nullable=true)
     */
    public $codePost;



    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set idAdmin
     *
     * @param integer $idAdmin
     *
     * @return Offres
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get idAdmin
     *
     * @return integer
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set idPartenaire
     *
     * @param integer $idPartenaire
     *
     * @return Offres
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

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Offres
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offres
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
     * Set type
     *
     * @param integer $type
     *
     * @return Offres
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

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Offres
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Offres
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

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Offres
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Offres
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
     * @return Offres
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
     * Set codePost
     *
     * @param string $codePost
     *
     * @return Offres
     */
    public function setCodePost($codePost)
    {
        $this->codePost = $codePost;

        return $this;
    }

    /**
     * Get codePost
     *
     * @return string
     */
    public function getCodePost()
    {
        return $this->codePost;
    }
}
