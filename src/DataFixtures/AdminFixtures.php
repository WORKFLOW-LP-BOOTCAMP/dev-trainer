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
        $articles = [];
        foreach ($this->getArticles() as ['title' => $title, 'created_at' => $createdAt, 'content' => $content]) {
            $a = new Article;
            $a->setTitle($title);
            $a->setCreatedAt(new \Datetime($createdAt));
            $a->setContent($content);

            $manager->persist($a);
            $articles[] = $a;
        }

        $manager->flush();
       
        $admin = new User();
        $admin->setFirstName('admin');
        $admin->setLastName('L');
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $plainPassword = 'admin';
        $hashedPassword = $this->passwordHasher->hashPassword($admin, $plainPassword);
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        $Supertrainer = new Trainer();
        $Supertrainer->setFirstName('Super trainer');
        $Supertrainer->setLastName('Lulu');
        $Supertrainer->setEmail('trainer@trainer.fr');
        $Supertrainer->setRoles(['ROLE_ADMIN', 'ROLE_APPRENTICE']);
        $plainPassword = 'trainer';
        $hashedPassword = $this->passwordHasher->hashPassword($Supertrainer, $plainPassword);
        $Supertrainer->setPassword($hashedPassword);
        $count = 0;
        while ($count < 2) {
            $count++;
            $Supertrainer->addArticle($articles[$count]);
        }
        $manager->persist($Supertrainer);

        $manager->flush();
    }

    public function getArticles(): array
    {
        return
            [
                ['title' => 'Super trainer: Introduction au HTML', 'created_at' => '2024-07-01 10:00:00', 'content' => 'Cet article couvre les bases du HTML, le langage de balisage utilisé pour créer des pages Web.'],
                ['title' => 'Super trainer: Comprendre le CSS', 'created_at' => '2024-06-30 12:00:00', 'content' => 'Apprenez à utiliser le CSS pour styliser vos pages Web et améliorer leur apparence visuelle.'],
                ['title' => 'Super trainer: Guide du JavaScript', 'created_at' => '2024-06-29 14:00:00', 'content' => 'Un guide complet sur JavaScript, le langage de programmation qui permet d\'ajouter des fonctionnalités interactives aux sites Web.'],
            ];
    }

    public static function getGroups(): array
    {
        return ['group2'];
    }
}
