<?php

namespace App\Entity;

use App\Repository\RecordsTransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecordsTransactionRepository::class)]
class RecordsTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameTransaction = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?PayeeTransaction $payee_name = null;

    #[ORM\ManyToOne]
    private ?TypeTransaction $type_name = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategoryTransaction $category_name = null;

    #[ORM\Column]
    private ?float $bedrag = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?YearTransaction $year = null;

    #[ORM\ManyToMany(targetEntity: PeriodTransaction::class)]
    private Collection $period_name;

    #[ORM\Column]
    private ?int $payment_day = null;

    public function __construct()
    {
        $this->period_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTransaction(): ?string
    {
        return $this->nameTransaction;
    }

    public function setNameTransaction(string $nameTransaction): static
    {
        $this->nameTransaction = $nameTransaction;

        return $this;
    }

    public function getPayeeName(): ?PayeeTransaction
    {
        return $this->payee_name;
    }

    public function setPayeeName(?PayeeTransaction $payee_name): static
    {
        $this->payee_name = $payee_name;

        return $this;
    }

    public function getTypeName(): ?TypeTransaction
    {
        return $this->type_name;
    }

    public function setTypeName(?TypeTransaction $type_name): static
    {
        $this->type_name = $type_name;

        return $this;
    }

    public function getCategoryName(): ?CategoryTransaction
    {
        return $this->category_name;
    }

    public function setCategoryName(?CategoryTransaction $category_name): static
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getBedrag(): ?float
    {
        return $this->bedrag;
    }

    public function setBedrag(float $bedrag): static
    {
        $this->bedrag = $bedrag;

        return $this;
    }

    public function getYear(): ?YearTransaction
    {
        return $this->year;
    }

    public function setYear(?YearTransaction $year): static
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection<int, PeriodTransaction>
     */
    public function getPeriodName(): Collection
    {
        return $this->period_name;
    }

    public function addPeriodName(PeriodTransaction $periodName): static
    {
        if (!$this->period_name->contains($periodName)) {
            $this->period_name->add($periodName);
        }

        return $this;
    }

    public function removePeriodName(PeriodTransaction $periodName): static
    {
        $this->period_name->removeElement($periodName);

        return $this;
    }

    public function getPaymentDay(): ?int
    {
        return $this->payment_day;
    }

    public function setPaymentDay(int $payment_day): static
    {
        $this->payment_day = $payment_day;

        return $this;
    }
}
