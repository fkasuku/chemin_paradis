<?php

namespace App\Entity;

use App\Entity\Traits\createdAtTrait;
use App\Entity\Traits\depenseTrait;
use App\Repository\DepensesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepensesRepository::class)]
class Depenses
{
    use depenseTrait;
    use createdAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }


}
