<?php

namespace App\Entity;

use App\Repository\CotisationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CotisationsRepository::class)
 */
class Cotisations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPaid;

    /**
     * @ORM\Column(type="float")
     */
    private $somme;

    /**
     * @ORM\ManyToOne(targetEntity=Infos::class, inversedBy="cotisations")
     */
    private $infos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): self
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getSomme(): ?float
    {
        return $this->somme;
    }

    public function setSomme(float $somme): self
    {
        $this->somme = $somme;

        return $this;
    }

    public function getInfos(): ?Infos
    {
        return $this->infos;
    }

}