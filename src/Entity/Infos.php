<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Images;
use App\Entity\Categories;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\InfosRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


// /**
//  * @ORM\Entity(repositoryClass=InfosRepository::class)
//  * @ORM\Table(name="infos",indexes={@ORM\Index(columns={"nom","prenom","image_name"}, flags={"fulltext"})})     # je lui dis que je veux un index fulltext  de mes colonnes nom, prenom et image_name de ma table infos
//  * @Vich\Uploadable
//  */


/**
 * @ORM\Entity(repositoryClass=InfosRepository::class)
 * @ORM\Table(name="infos",indexes={@ORM\Index(columns={"nom","prenom","image_name"}, flags={"fulltext"})})     # je lui dis que je veux un index fulltext  de mes colonnes nom, prenom et image_name de ma table infos
 * @Vich\Uploadable
 */
class Infos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="users", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->cotisations = new ArrayCollection();
    }

   
    

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieudenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieudetravail;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $parcoursprof;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $parcoursscolaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilite;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="infos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Users;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActivate = false;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codepostale;

    // /**
    //  * @ORM\Column(type="string", length=20, nullable=true)
    //  */
    // private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="infos")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civilitesexe;

    

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $adhesionPaid;


    
    
    # Surcharge
    public function __toString()
    {
        return $this->nom;
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getLieudenaissance(): ?string
    {
        return $this->lieudenaissance;
    }

    public function setLieudenaissance(string $lieudenaissance): self
    {
        $this->lieudenaissance = $lieudenaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(?string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getLieudetravail(): ?string
    {
        return $this->lieudetravail;
    }

    public function setLieudetravail(?string $lieudetravail): self
    {
        $this->lieudetravail = $lieudetravail;

        return $this;
    }

    public function getParcoursprof(): ?string
    {
        return $this->parcoursprof;
    }

    public function setParcoursprof(?string $parcoursprof): self
    {
        $this->parcoursprof = $parcoursprof;

        return $this;
    }

    public function getParcoursscolaire(): ?string
    {
        return $this->parcoursscolaire;
    }

    public function setParcoursscolaire(?string $parcoursscolaire): self
    {
        $this->parcoursscolaire = $parcoursscolaire;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }

    public function getIsActivate(): ?bool
    {
        return $this->isActivate;
    }

    public function setIsActivate(bool $isActivate): self
    {
        $this->isActivate = $isActivate;

        return $this;
    }

    public function getCodepostale(): ?string
    {
        return $this->codepostale;
    }

    public function setCodepostale(string $codepostale): self
    {
        $this->codepostale = $codepostale;

        return $this;
    }

    

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

   
    
    /**
     * Si vous téléchargez manuellement un fichier (c'est-à-dire sans utiliser Symfony Form), assurez-vous qu'une instance 
     * de 'UploadedFile' est injectée dans ce setter pour déclencher la mise à jour. Si le paramètre de configuration de ce bundle
     * 'inject_on_load' est mis à 'true', ce setter doit être capable d'accepter une instance de 'File' car le bundle en injectera une ici 
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * pendant l'hydratation de Doctrine. 
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getCivilitesexe(): ?string
    {
        return $this->civilitesexe;
    }

    public function setCivilitesexe(string $civilitesexe): self
    {
        $this->civilitesexe = $civilitesexe;

        return $this;
    }

    

    public function getAdhesionPaid(): ?bool
    {
        return $this->adhesionPaid;
    }

    public function setAdhesionPaid(?bool $adhesionPaid): self
    {
        $this->adhesionPaid = $adhesionPaid;

        return $this;
    }


}