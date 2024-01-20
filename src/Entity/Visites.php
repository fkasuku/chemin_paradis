<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\VisitesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitesRepository::class)]
class Visites
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $visiteur = null;

    #[ORM\Column]
    private ?int $nfvisite = null;

    #[ORM\Column(length: 50)]
    private ?string $cas = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $action = null;

    #[ORM\Column]
    private ?int $np_evangelise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisiteur(): ?string
    {
        return $this->visiteur;
    }

    public function setVisiteur(string $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    public function getNfvisite(): ?int
    {
        return $this->nfvisite;
    }

    public function setNfvisite(int $nfvisite): self
    {
        $this->nfvisite = $nfvisite;

        return $this;
    }

    public function getCas(): ?string
    {
        return $this->cas;
    }

    public function setCas(string $cas): self
    {
        $this->cas = $cas;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getNpEvangelise(): ?int
    {
        return $this->np_evangelise;
    }

    public function setNpEvangelise(int $np_evangelise): self
    {
        $this->np_evangelise = $np_evangelise;

        return $this;
    }
}
