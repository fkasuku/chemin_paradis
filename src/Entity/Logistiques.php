<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\LogistiquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogistiquesRepository::class)]
class Logistiques
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $materiel = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 50)]
    private ?string $marque = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 50)]
    private ?string $etat = null;

    #[ORM\Column(length: 50)]
    private ?string $casse = null;

    #[ORM\Column(length: 50)]
    private ?string $ajout = null;

    #[ORM\Column]
    private ?int $total = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMateriel(): ?string
    {
        return $this->materiel;
    }

    public function setMateriel(string $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCasse(): ?string
    {
        return $this->casse;
    }

    public function setCasse(string $casse): self
    {
        $this->casse = $casse;

        return $this;
    }

    public function getAjout(): ?string
    {
        return $this->ajout;
    }

    public function setAjout(string $ajout): self
    {
        $this->ajout = $ajout;

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
}
