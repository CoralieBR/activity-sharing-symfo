<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GroupeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $groupe = new Groupe();
        $groupe->setNomGroupe('Yoga a la plage');
        $groupe->setDate(2021-06-05);
        $groupe->setJour('lundi');
        $groupe->setHeureDebut('14');
        $groupe->setHeureFin('15');
        $groupe->setCp('13000');
        $groupe->setVille('Grenoble');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide('1');
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $manager->persist($groupe);
       
        $groupe = new Groupe();
        $groupe->setNomGroupe('Théatre au parc');
        $groupe->setDate();
        $groupe->setJour('mardi');
        $groupe->setHeureDebut('9');
        $groupe->setHeureFin('11');
        $groupe->setCp('17000');
        $groupe->setVille('Marseille');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide('1');
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $manager->persist($groupe);
        
        $groupe = new Groupe();
        $groupe->setNomGroupe('Velo a la plage');
        $groupe->setDate();
        $groupe->setJour('mercredi');
        $groupe->setHeureDebut('14');
        $groupe->setHeureFin('15');
        $groupe->setCp('13000');
        $groupe->setVille('Marseille');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide('1');
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($groupe);

        $groupe = new Groupe();
        $groupe->setNomGroupe('Velo a la plage');
        $groupe->setDate();
        $groupe->setJour('jeudi');
        $groupe->setHeureDebut('14');
        $groupe->setHeureFin('15');
        $groupe->setCp('13000');
        $groupe->setVille('Marseille');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide('1');
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_TENNIS));
        $manager->persist($groupe);
        $manager->flush();

        $groupe = new Groupe();
        $groupe->setNomGroupe('Velo a la plage');
        $groupe->setDate();
        $groupe->setJour('vendredi');
        $groupe->setHeureDebut('14');
        $groupe->setHeureFin('15');
        $groupe->setCp('13000');
        $groupe->setVille('Marseille');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide('1');
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $manager->persist($groupe);
        $manager->flush();
    }
}

            