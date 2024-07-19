<?php

namespace App\Entity\Customer;

use App\Repository\Customer\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?array $info = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfo(): ?array
    {
        return $this->info;
    }

    public function setInfo(?array $info): static
    {
        $this->info = $info;

        return $this;
    }
}
