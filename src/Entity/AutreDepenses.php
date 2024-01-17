<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Entity\Traits\depenseTrait;
use App\Repository\AutreDepensesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutreDepensesRepository::class)]
class AutreDepenses
{
    use depenseTrait;
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'autreDepenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offrandes $offrande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffrande(): ?Offrandes
    {
        return $this->offrande;
    }

    public function setOffrande(?Offrandes $offrande): self
    {
        $this->offrande = $offrande;

        return $this;
    }
}
