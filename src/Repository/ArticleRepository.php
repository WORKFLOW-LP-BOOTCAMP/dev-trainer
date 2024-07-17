<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findAllArticleNoSuperTrainer(string $firstName): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\Trainer t
            WHERE t.firstName = :firstName'
        )->setParameter('firstName', $firstName);

        $resultTrainer = $query->getOneOrNullResult();

        $query = null;

        $query = $entityManager->createQuery(
            'SELECT a
            FROM App\Entity\Article a
            WHERE a.id != :id'
        )->setParameter('id', $resultTrainer->getId());

        return $query->getResult();
    }
}
