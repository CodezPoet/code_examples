<?php

namespace App\Entity;

use App\Repository\PeriodTransactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodTransactionRepository::class)]
class PeriodTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $period_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriodName(): ?string
    {
        return $this->period_name;
    }

    public function setPeriodName(string $period_name): static
    {
        $this->period_name = $period_name;

        return $this;
    }
}
