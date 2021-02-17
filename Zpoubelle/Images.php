<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    // /**
    //  * @ORM\OneToOne(targetEntity=Infos::class, inversedBy="images", cascade={"persist", "remove"})
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    // private $infos;

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

    // public function getInfos(): ?Infos
    // {
    //     return $this->infos;
    // }

    // public function setInfos(Infos $infos): self
    // {
    //     $this->infos = $infos;

    //     return $this;
    // }
}