<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Trainer>
     */
    #[ORM\ManyToMany(targetEntity: Trainer::class, inversedBy: 'subjects')]
    private Collection $trainers;

    public function __construct()
    {
        $this->trainers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Trainer>
     */
    public function getTrainers(): Collection
    {
        return $this->trainers;
    }

    public function addTrainer(Trainer $trainer): static
    {
        if (!$this->trainers->contains($trainer)) {
            $this->trainers->add($trainer);
        }

        return $this;
    }

    public function removeTrainer(Trainer $trainer): static
    {
        $this->trainers->removeElement($trainer);

        return $this;
    }
}
