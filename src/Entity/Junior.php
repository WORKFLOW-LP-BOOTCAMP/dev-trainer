<?php

namespace App\Entity;

use App\Repository\JuniorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuniorRepository::class)]
class Junior extends Trainer
{

    #[ORM\Column(length: 255)]
    private ?string $grade = null;

    #[ORM\Column(nullable: true)]
    private ?float $age = null;


    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getAge(): ?float
    {
        return $this->age;
    }

    public function setAge(?float $age): static
    {
        $this->age = $age;

        return $this;
    }
}
