<?php

namespace App\Entity\Traits;

use App\Entity\Cultes;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait depenseTrait
{
    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $motif = null;

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cultes $culte = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

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