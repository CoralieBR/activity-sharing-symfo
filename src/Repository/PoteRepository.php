<?php

namespace App\Repository;

use App\Entity\Pote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pote[]    findAll()
 * @method Pote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pote::class);
    }

    // /**
    //  * @return Pote[] Returns an array of Pote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pote
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
