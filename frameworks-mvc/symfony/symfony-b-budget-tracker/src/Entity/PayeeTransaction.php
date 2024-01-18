<?php

namespace App\Entity;

use App\Repository\PayeeTransactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayeeTransactionRepository::class)]
class PayeeTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $payee_name = null;

    public function __construct()
    {
      
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayeeName(): ?string
    {
        return $this->payee_name;
    }

    public function setPayeeName(string $payee_name): static
    {
        $this->payee_name = $payee_name;

        return $this;
    }

}
