<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\WpContentRepository;

#[ORM\Entity(repositoryClass: WpContentRepository::class)]
class WpContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    private ?int $ID = null;
    
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $post_title = null;

    public function getId(): ?int
    {
        return $this->ID;
    }

    public function setID(int $ID): static
    {
        $this->ID = $ID;

        return $this;
    }

    public function getPostTitle(): ?string
    {
        return $this->post_title;
    }

    public function setPostTitle(?string $post_title): static
    {
        $this->post_title = $post_title;

        return $this;
    } 
}
