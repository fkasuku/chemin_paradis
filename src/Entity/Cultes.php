<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Repository\CultesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultesRepository::class)]
class Cultes
{
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(length: 50)]
    private ?string $debut = null;

    #[ORM\Column(length: 50)]
    private ?string $fin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $theme = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $reference = null;

    #[ORM\ManyToOne(inversedBy: 'cultes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serviteurs $jour = null;

    #[ORM\ManyToOne(inversedBy: 'cultes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serviteurs $moderateur = null;

    #[ORM\ManyToOne(inversedBy: 'cultes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serviteurs $predicateur = null;

    #[ORM\ManyToOne(inversedBy: 'cultes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Serviteurs $interprete = null;

    #[ORM\OneToMany(mappedBy: 'culte', targetEntity: Effectifs::class)]
    private Collection $effectifs;

    #[ORM\OneToMany(mappedBy: 'culte', targetEntity: Offrandes::class)]
    private Collection $offrandes;

    #[ORM\OneToMany(mappedBy: 'culte', targetEntity: Visiteurs::class)]
    private Collection $visiteurs;

    #[ORM\OneToMany(mappedBy: 'culte', targetEntity: Depenses::class)]
    private Collection $depenses;

    public function __construct()
    {
        $this->effectifs = new ArrayCollection();
        $this->offrandes = new ArrayCollection();
        $this->visiteurs = new ArrayCollection();
        $this->depenses = new ArrayCollection();
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

    public function getDebut(): ?string
    {
        return $this->debut;
    }

    public function setDebut(string $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?string
    {
        return $this->fin;
    }

    public function setFin(string $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getJour(): ?Serviteurs
    {
        return $this->jour;
    }

    public function setJour(?Serviteurs $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getModerateur(): ?Serviteurs
    {
        return $this->moderateur;
    }

    public function setModerateur(?Serviteurs $moderateur): self
    {
        $this->moderateur = $moderateur;

        return $this;
    }

    public function getPredicateur(): ?Serviteurs
    {
        return $this->predicateur;
    }

    public function setPredicateur(?Serviteurs $predicateur): self
    {
        $this->predicateur = $predicateur;

        return $this;
    }

    public function getInterprete(): ?Serviteurs
    {
        return $this->interprete;
    }

    public function setInterprete(?Serviteurs $interprete): self
    {
        $this->interprete = $interprete;

        return $this;
    }

    /**
     * @return Collection<int, Effectifs>
     */
    public function getEffectifs(): Collection
    {
        return $this->effectifs;
    }

    public function addEffectif(Effectifs $effectif): self
    {
        if (!$this->effectifs->contains($effectif)) {
            $this->effectifs->add($effectif);
            $effectif->setCulte($this);
        }

        return $this;
    }

    public function removeEffectif(Effectifs $effectif): self
    {
        if ($this->effectifs->removeElement($effectif)) {
            // set the owning side to null (unless already changed)
            if ($effectif->getCulte() === $this) {
                $effectif->setCulte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Offrandes>
     */
    public function getOffrandes(): Collection
    {
        return $this->offrandes;
    }

    public function addOffrande(Offrandes $offrande): self
    {
        if (!$this->offrandes->contains($offrande)) {
            $this->offrandes->add($offrande);
            $offrande->setCulte($this);
        }

        return $this;
    }

    public function removeOffrande(Offrandes $offrande): self
    {
        if ($this->offrandes->removeElement($offrande)) {
            // set the owning side to null (unless already changed)
            if ($offrande->getCulte() === $this) {
                $offrande->setCulte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Visiteurs>
     */
    public function getVisiteurs(): Collection
    {
        return $this->visiteurs;
    }

    public function addVisiteur(Visiteurs $visiteur): self
    {
        if (!$this->visiteurs->contains($visiteur)) {
            $this->visiteurs->add($visiteur);
            $visiteur->setCulte($this);
        }

        return $this;
    }

    public function removeVisiteur(Visiteurs $visiteur): self
    {
        if ($this->visiteurs->removeElement($visiteur)) {
            // set the owning side to null (unless already changed)
            if ($visiteur->getCulte() === $this) {
                $visiteur->setCulte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Depenses>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depenses $depense): self
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setCulte($this);
        }

        return $this;
    }

    public function removeDepense(Depenses $depense): self
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getCulte() === $this) {
                $depense->setCulte(null);
            }
        }

        return $this;
    }
}
