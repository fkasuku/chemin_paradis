<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Entity\Traits\serviteurTrait;
use App\Repository\ServiteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiteursRepository::class)]
class Serviteurs
{
    use createdAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $jour = null;

    #[ORM\Column(length: 50)]
    private ?string $moderateur = null;

    #[ORM\Column(length: 50)]
    private ?string $orateur = null;

    #[ORM\Column(length: 50)]
    private ?string $interprete = null;

    #[ORM\OneToMany(mappedBy: 'jour', targetEntity: Cultes::class)]
    private Collection $cultes;

    public function __construct()
    {
        $this->cultes = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getModerateur(): ?string
    {
        return $this->moderateur;
    }

    public function setModerateur(string $moderateur): self
    {
        $this->moderateur = $moderateur;

        return $this;
    }

    public function getOrateur(): ?string
    {
        return $this->orateur;
    }

    public function setOrateur(string $orateur): self
    {
        $this->orateur = $orateur;

        return $this;
    }

    public function getInterprete(): ?string
    {
        return $this->interprete;
    }

    public function setInterprete(string $interprete): self
    {
        $this->interprete = $interprete;

        return $this;
    }

    /**
     * @return Collection<int, Cultes>
     */
    public function getCultes(): Collection
    {
        return $this->cultes;
    }

    public function addCulte(Cultes $culte): self
    {
        if (!$this->cultes->contains($culte)) {
            $this->cultes->add($culte);
            $culte->setJour($this);
        }

        return $this;
    }

    public function removeCulte(Cultes $culte): self
    {
        if ($this->cultes->removeElement($culte)) {
            // set the owning side to null (unless already changed)
            if ($culte->getJour() === $this) {
                $culte->setJour(null);
            }
        }

        return $this;
    }


}
