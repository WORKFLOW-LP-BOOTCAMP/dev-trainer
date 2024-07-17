<?php

namespace App\DataFixtures;

use App\Entity\Junior;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class JuniorFixtures extends Fixture implements FixtureGroupInterface
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
        $plainPassword = '123';
        $hashedPassword = $this->passwordHasher->hashPassword($junior, $plainPassword);
        $junior->setPassword($hashedPassword);

        $manager->persist($junior);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}
