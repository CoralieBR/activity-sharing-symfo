<?php

namespace App\Repository;

use App\Entity\Groupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Groupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Groupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Groupe[]    findAll()
 * @method Groupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Groupe::class);
    }

    public function findGroupeMembres(string $jour, int $heureDebut, int $heureFin, string $activite/*, string $longitude, string $latitude, int $distance*/): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery('
            SELECT m
            FROM App\Entity\Membre m
            INNER JOIN m.moments mo
            INNER JOIN m.activites a
            WHERE mo.jour = :jour
            AND mo.heureDebut <= :heureDebut
            AND mo.heureFin >= :heureFin
            AND a.nomActivite = :activite
        ');
        $query->setParameters(array(
            'jour' => $jour,
            'heureDebut' => $heureDebut,
            'heureFin' => $heureFin,
            'activite' => $activite,
            // 'longitude' => $longitude,
            // 'latitude' => $latitude,
            // 'distancekm' => $distance
        ));
        return $query->getResult();
    }

    // /**
    //  * @return Groupe[] Returns an array of Groupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Groupe
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
