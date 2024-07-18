<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\{Article, User, Trainer};
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class AdminFixtures extends Fixture implements FixtureGroupInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setFirstName('admin');
        $admin->setLastName('L');
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $plainPassword = 'admin';
        $hashedPassword = $this->passwordHasher->hashPassword($admin, $plainPassword);
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        $trainer = new Trainer();
        $trainer->setFirstName('Alan');
        $trainer->setLastName('T');
        $trainer->setEmail('trainer@trainer.fr');
        $trainer->setRoles(['ROLE_APPRENTICE']);
        $plainPassword = 'trainer';
        $hashedPassword = $this->passwordHasher->hashPassword($trainer, $plainPassword);
        $trainer->setPassword($hashedPassword);
        $manager->persist($trainer);

        $manager->flush();
    }


    public static function getGroups(): array
    {
        return ['group2'];
    }
}
