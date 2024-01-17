<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\OffrandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffrandesRepository::class)]
class Offrandes
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column]
    private ?int $cumul = null;

    #[ORM\Column]
    private ?int $total = null;

    #[ORM\ManyToOne(inversedBy: 'offrandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cultes $culte = null;

    #[ORM\OneToMany(mappedBy: 'offrande', targetEntity: AutreDepenses::class)]
    private Collection $autreDepenses;

    public function __construct()
    {
        $this->autreDepenses = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getCumul(): ?int
    {
        return $this->cumul;
    }

    public function setCumul(int $cumul): self
    {
        $this->cumul = $cumul;

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

    /**
     * @return Collection<int, AutreDepenses>
     */
    public function getAutreDepenses(): Collection
    {
        return $this->autreDepenses;
    }

    public function addAutreDepense(AutreDepenses $autreDepense): self
    {
        if (!$this->autreDepenses->contains($autreDepense)) {
            $this->autreDepenses->add($autreDepense);
            $autreDepense->setOffrande($this);
        }

        return $this;
    }

    public function removeAutreDepense(AutreDepenses $autreDepense): self
    {
        if ($this->autreDepenses->removeElement($autreDepense)) {
            // set the owning side to null (unless already changed)
            if ($autreDepense->getOffrande() === $this) {
                $autreDepense->setOffrande(null);
            }
        }

        return $this;
    }
}
