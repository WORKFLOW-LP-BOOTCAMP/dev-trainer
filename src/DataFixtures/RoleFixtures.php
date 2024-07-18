<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Trainer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $apprentice = $manager->getRepository(Trainer::class)->findOneBy([
            'firstName' => 'Alan'
        ]);
        $count = 0;
        $articlesFaker = $this->getArticles();
        while ($count < count( $articlesFaker )) {
            $article = new Article();
            $a = $articlesFaker[$count] ;
            $article->setTitle($a['title']);
            $article->setCreatedAt(new \DateTime($a['created_at']));
            $article->setContent($a['content']);
            $article->setTrainer($apprentice);
            $manager->persist($article);
            $count++;
        }

        $manager->flush();
    }

    public function getArticles(): array
    {
        return
            [
                ['title' => 'Super Trainer Introduction au HTML', 'created_at' => '2024-07-01 10:00:00', 'content' => 'Cet article couvre les bases du HTML, le langage de balisage utilisé pour créer des pages Web.'],
                ['title' => 'Super Trainer Sécurité Web : Les bases', 'created_at' => '2024-06-22 11:00:00', 'content' => 'Comprenez les principes de base de la sécurité Web pour protéger vos applications contre les attaques courantes.'],
                ['title' => 'Super Trainer Optimisation des performances Web', 'created_at' => '2024-06-21 13:00:00', 'content' => 'Des conseils pour améliorer les performances de vos sites Web et réduire les temps de chargement.'],
                ['title' => 'Super Trainer Introduction à React.js', 'created_at' => '2024-06-20 15:00:00', 'content' => 'Découvrez les bases de React.js, une bibliothèque JavaScript pour la création d\'interfaces utilisateur.'],
                ['title' => 'Super Trainer Développement Full Stack', 'created_at' => '2024-06-19 17:00:00', 'content' => 'Un aperçu du développement Full Stack, couvrant à la fois le front-end et le back-end.'],
                ['title' => 'Super Trainer Gestion de projet avec Agile', 'created_at' => '2024-06-18 19:00:00', 'content' => 'Apprenez les principes de la gestion de projet Agile pour améliorer l\'efficacité de vos équipes de développement.'],
            ];
    }

    public function getDependencies()
    {

        return [
            ApprenticeFixtures::class,
        ];
    }
}
