<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        foreach ($this->getArticles() as ['title' => $title, 'created_at' => $createdAt, 'content' => $content]) {
            $a = new Article();
            $a->setTitle($title);
            $a->setCreatedAt(new \Datetime($createdAt));
            $a->setContent($content);

            $manager->persist($a);
        }

        $manager->flush();
    }

    public function getArticles(): array
    {
        return
            [
                ['title' => 'Introduction au HTML', 'created_at' => '2024-07-01 10:00:00', 'content' => 'Cet article couvre les bases du HTML, le langage de balisage utilisé pour créer des pages Web.'],
                ['title' => 'Comprendre le CSS', 'created_at' => '2024-06-30 12:00:00', 'content' => 'Apprenez à utiliser le CSS pour styliser vos pages Web et améliorer leur apparence visuelle.'],
                ['title' => 'Guide du JavaScript', 'created_at' => '2024-06-29 14:00:00', 'content' => 'Un guide complet sur JavaScript, le langage de programmation qui permet d\'ajouter des fonctionnalités interactives aux sites Web.'],
                ['title' => 'Introduction à PHP', 'created_at' => '2024-06-28 16:00:00', 'content' => 'Découvrez les bases de PHP, un langage de script côté serveur utilisé pour le développement Web.'],
                ['title' => 'Bases de MySQL', 'created_at' => '2024-06-27 18:00:00', 'content' => 'Un aperçu des bases de données MySQL et comment les utiliser pour stocker et gérer des données pour vos applications Web.'],
                ['title' => 'Introduction à Node.js', 'created_at' => '2024-06-26 20:00:00', 'content' => 'Apprenez les fondamentaux de Node.js, un environnement d\'exécution JavaScript côté serveur.'],
                ['title' => 'Utilisation de Git et GitHub', 'created_at' => '2024-06-25 22:00:00', 'content' => 'Un guide sur l\'utilisation de Git pour le contrôle de version et GitHub pour l\'hébergement de code.'],
                ['title' => 'Créer des API RESTful avec PHP', 'created_at' => '2024-06-24 08:00:00', 'content' => 'Découvrez comment créer des API RESTful avec PHP pour permettre à vos applications de communiquer entre elles.'],
                ['title' => 'Développement Web avec Laravel', 'created_at' => '2024-06-23 09:00:00', 'content' => 'Une introduction à Laravel, un framework PHP populaire pour le développement Web.'],
                ['title' => 'Sécurité Web : Les bases', 'created_at' => '2024-06-22 11:00:00', 'content' => 'Comprenez les principes de base de la sécurité Web pour protéger vos applications contre les attaques courantes.'],
                ['title' => 'Optimisation des performances Web', 'created_at' => '2024-06-21 13:00:00', 'content' => 'Des conseils pour améliorer les performances de vos sites Web et réduire les temps de chargement.'],
                ['title' => 'Introduction à React.js', 'created_at' => '2024-06-20 15:00:00', 'content' => 'Découvrez les bases de React.js, une bibliothèque JavaScript pour la création d\'interfaces utilisateur.'],
                ['title' => 'Développement Full Stack', 'created_at' => '2024-06-19 17:00:00', 'content' => 'Un aperçu du développement Full Stack, couvrant à la fois le front-end et le back-end.'],
                ['title' => 'Gestion de projet avec Agile', 'created_at' => '2024-06-18 19:00:00', 'content' => 'Apprenez les principes de la gestion de projet Agile pour améliorer l\'efficacité de vos équipes de développement.'],
                ['title' => 'Tests automatisés en PHP', 'created_at' => '2024-06-17 21:00:00', 'content' => 'Un guide sur les tests automatisés en PHP pour garantir la qualité de votre code.'],
                ['title' => 'Introduction à Vue.js', 'created_at' => '2024-06-16 23:00:00', 'content' => 'Apprenez à utiliser Vue.js, un framework JavaScript progressif pour la construction d\'interfaces utilisateur.'],
                ['title' => 'Déploiement continu avec CI/CD', 'created_at' => '2024-06-15 08:00:00', 'content' => 'Découvrez comment mettre en place des pipelines de déploiement continu pour automatiser vos déploiements.'],
                ['title' => 'Accessibilité Web', 'created_at' => '2024-06-14 09:00:00', 'content' => 'Comprenez l\'importance de l\'accessibilité Web et apprenez comment rendre vos sites accessibles à tous.'],
                ['title' => 'Introduction à TypeScript', 'created_at' => '2024-06-13 11:00:00', 'content' => 'Un aperçu de TypeScript, un sur-ensemble de JavaScript qui ajoute des types statiques.'],
                ['title' => 'Utilisation des WebSockets', 'created_at' => '2024-06-12 13:00:00', 'content' => 'Apprenez à utiliser les WebSockets pour créer des applications Web en temps réel.'],
                ['title' => 'Introduction à SASS', 'created_at' => '2024-06-11 15:00:00', 'content' => 'Découvrez SASS, un préprocesseur CSS qui permet d\'écrire du CSS plus propre et plus maintenable.'],
                ['title' => 'Optimisation SEO pour les développeurs', 'created_at' => '2024-06-10 17:00:00', 'content' => 'Des conseils pour améliorer le référencement de vos sites Web en tant que développeur.'],
                ['title' => 'Introduction à Django', 'created_at' => '2024-06-09 19:00:00', 'content' => 'Apprenez les bases de Django, un framework Python pour le développement Web rapide.'],
                ['title' => 'Gestion de l\'état avec Redux', 'created_at' => '2024-06-08 21:00:00', 'content' => 'Un guide sur l\'utilisation de Redux pour la gestion de l\'état dans les applications JavaScript.'],
                ['title' => 'Création de plugins WordPress', 'created_at' => '2024-06-07 23:00:00', 'content' => 'Découvrez comment créer des plugins WordPress pour étendre les fonctionnalités de vos sites.'],
                ['title' => 'Introduction à GraphQL', 'created_at' => '2024-06-06 08:00:00', 'content' => 'Apprenez les bases de GraphQL, un langage de requête pour les API.'],
                ['title' => 'Développement mobile avec React Native', 'created_at' => '2024-06-05 09:00:00', 'content' => 'Découvrez comment créer des applications mobiles avec React Native.'],
                ['title' => 'Introduction à Express.js', 'created_at' => '2024-06-04 11:00:00', 'content' => 'Un aperçu d\'Express.js, un framework minimaliste pour Node.js.'],
                ['title' => 'Introduction aux Progressive Web Apps', 'created_at' => '2024-06-03 13:00:00', 'content' => 'Apprenez à créer des Progressive Web Apps (PWA) pour offrir une expérience utilisateur améliorée.'],
                ['title' => 'Développement Web avec Ruby on Rails', 'created_at' => '2024-06-02 15:00:00', 'content' => 'Découvrez Ruby on Rails, un framework pour le développement d\'applications Web.'],
                ['title' => 'Introduction à Flutter', 'created_at' => '2024-06-01 17:00:00', 'content' => 'Apprenez les bases de Flutter, un framework UI pour créer des applications nativement compilées.'],
                ['title' => 'Intégration de services tiers avec API', 'created_at' => '2024-05-31 19:00:00', 'content' => 'Un guide sur l\'intégration de services tiers dans vos applications via des API.'],
                ['title' => 'Introduction à Next.js', 'created_at' => '2024-05-30 21:00:00', 'content' => 'Découvrez Next.js, un framework React pour le rendu côté serveur.'],
                ['title' => 'Développement Web avec ASP.NET Core', 'created_at' => '2024-05-29 23:00:00', 'content' => 'Apprenez à développer des applications Web avec ASP.NET Core.'],
                ['title' => 'Introduction à Docker', 'created_at' => '2024-05-28 08:00:00', 'content' => 'Découvrez Docker, un outil de conteneurisation pour développer, expédier et exécuter des applications.'],
            ];
    }
}
