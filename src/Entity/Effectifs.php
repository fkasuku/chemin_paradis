<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\EffectifsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EffectifsRepository::class)]
class Effectifs
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $papa = null;

    #[ORM\Column]
    private ?int $maman = null;

    #[ORM\Column]
    private ?int $enfant = null;

    #[ORM\Column]
    private ?int $total = null;

    #[ORM\ManyToOne(inversedBy: 'effectifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cultes $culte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPapa(): ?int
    {
        return $this->papa;
    }

    public function setPapa(int $papa): self
    {
        $this->papa = $papa;

        return $this;
    }

    public function getMaman(): ?int
    {
        return $this->maman;
    }

    public function setMaman(int $maman): self
    {
        $this->maman = $maman;

        return $this;
    }

    public function getEnfant(): ?int
    {
        return $this->enfant;
    }

    public function setEnfant(int $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getCulte(): ?Cultes
    {
        return $this->culte;
    }

    public function setCulte(?Cultes $culte): self
    {
        $this->culte = $culte;

        return $this;
    }
}
