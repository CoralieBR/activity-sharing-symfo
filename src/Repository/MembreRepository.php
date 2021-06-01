<?php

namespace App\Repository;

use App\Entity\Membre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method Membre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Membre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Membre[]    findAll()
 * @method Membre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembreRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Membre::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof Membre) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * @return Membre[] Returns an array of Membre objects
     */
    // SELECT * FROM membre 
    // INNER JOIN moment ON moment.id_membre_id = membre.id 
    // INNER JOIN membre_activite ON membre.id = membre_activite.membre_id 
    // INNER JOIN activite ON membre_activite.activite_id = activite.id 
    // WHERE moment.jour = 'samedi' 
    // AND moment.heure_debut <= 11 
    // AND moment.heure_fin >= 12 
    // AND activite.nom_activite = 'yoga' 
    
    // public function findGroupeMembres(string $jour, int $heureDebut, int $heureFin, string $activite, string $longitude, string $latitude, int $distance): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery('
    //         SELECT m
    //         FROM App\Entity\Membre m
    //         INNER JOIN m.moment mo
    //         INNER JOIN m.activite a
    //         INNER JOIN m.groupe g,
    //         (((acos(sin((".:latitude."*pi()/180)) * sin((`latitude`*pi()/180)) + cos((".:latitude."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".:longitude."- `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance 
    //         WHERE mo.jour = :jour
    //         AND mo.heure_debut <= :heureDebut
    //         AND mo.heure_fin >= :heureFin
    //         AND a.nom_activite = :activite
    //         AND distance <= .:distancekm.
            
    //     ');
    //     $query->setParameters(array(
    //         'jour' => $jour,
    //         'heureDebut' => $heureDebut,
    //         'heureFin' => $heureFin,
    //         'activite' => $activite,
    //         'longitude' => $longitude,
    //         'latitude' => $latitude,
    //         'distancekm' => $distance
    //     ));
    //     return $query->getResult();
    // }
    
    public function findGroupeMembres2(string $longitude, string $latitude, int $distance): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery('
        SELECT *,
        (((acos(sin((".:latitude."*pi()/180)) * sin((`latitude`*pi()/180)) + cos((".:latitude."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".:longitude."- `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `groupe` WHERE distance <= ".:distancekm.
        ');

        // $query = "SELECT *, (((acos(sin((".$latitude."*pi()/180)) * sin((`latitude`*pi()/180)) + cos((".$latitude."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".$longitude."- `longitude`) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM `table` WHERE distance <= ".$distance."

        $query->setParameters(array(
            'longitude' => $longitude,
            'latitude' => $latitude,
            'distancekm' => $distance
        ));
        return $query->getResult();
    }
    
    
    /*
    public function findOneBySomeField($value): ?Membre
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
