<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $groupe = new Groupe();
        $groupe->setNomGroupe('Yoga Chèvre');
        // $groupe->setDate(2021-06-05);
        $groupe->setJour('samedi');
        $groupe->getHeureDebut(11);
        $groupe->getHeureFin(12);
        $groupe->setAdresseNumero(5);
        $groupe->setAdresseRue('reu Saint Alexandre');
        $groupe->setCp('69005');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('45.7565');
        $groupe->setLongitude('4.8158');
        $manager->persist($groupe);

        $manager->flush();
    }
}
