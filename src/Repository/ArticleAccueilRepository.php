<?php

namespace App\Repository;

use App\Entity\ArticleAccueil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleAccueil|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleAccueil|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleAccueil[]    findAll()
 * @method ArticleAccueil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleAccueilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleAccueil::class);
    }

    // /**
    //  * @return ArticleAccueil[] Returns an array of ArticleAccueil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleAccueil
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
