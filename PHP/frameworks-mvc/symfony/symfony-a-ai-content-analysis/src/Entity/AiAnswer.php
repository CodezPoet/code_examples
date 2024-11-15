<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AiAnswerRepository;

#[ORM\Entity(repositoryClass: AiAnswerRepository::class)]
class AiAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $phrase = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $use_phrase = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhrase(): ?string
    {
        return $this->phrase;
    }

    public function setPhrase(string $phrase): static
    {
        $this->phrase = $phrase;

        return $this;
    }

    public function getUsePhrase(): ?string
    {
        return $this->use_phrase;
    }

    public function setUsePhrase(?string $use_phrase): static
    {
        $this->use_phrase = $use_phrase;

        return $this;
    }
}
