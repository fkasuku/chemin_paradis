<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\CommuniqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuniqueRepository::class)]
class Communique
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $entete = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntete(): ?string
    {
        return $this->entete;
    }

    public function setEntete(string $entete): self
    {
        $this->entete = $entete;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}
