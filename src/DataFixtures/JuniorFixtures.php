<?php

namespace App\DataFixtures;

use App\Entity\Junior;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class JuniorFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $junior = new Junior();
        $junior->setAge(23);
        $junior->setFirstName('Mat');
        $junior->setLastName('C');
        $junior->setEmail('junior@junior.fr');
        $junior->setBio('bac');
        $plainPassword = '123';
        $hashedPassword = $this->passwordHasher->hashPassword($junior, $plainPassword);
        $junior->setPassword($hashedPassword);

        $manager->persist($junior);

        $manager->flush();
    }
}
