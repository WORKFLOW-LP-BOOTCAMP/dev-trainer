<?php

namespace App\Entity;

use App\Repository\ApprenticeRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Enum\Domain as Domain;

#[ORM\Entity(repositoryClass: ApprenticeRepository::class)]
class Apprentice extends Trainer
{

    #[ORM\Column(type: 'string', enumType: Domain::class)]
    private ?Domain $domain = null;


    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(Domain $domain): static
    {
        $this->domain = $domain;

        return $this;
    }
}
