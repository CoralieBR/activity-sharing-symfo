<?php

namespace App\DataFixtures;

use App\Entity\Moment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MomentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_UN));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(18);
        $moment->setHeureFin(20);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_UN));
        $moment->setJour('samedi');
        $moment->setHeureDebut(10);
        $moment->setHeureFin(20);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_DEUX));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(16);
        $moment->setHeureFin(18);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_DEUX));
        $moment->setJour('samedi');
        $moment->setHeureDebut(10);
        $moment->setHeureFin(12);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_TROIS));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(16);
        $moment->setHeureFin(18);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_TROIS));
        $moment->setJour('samedi');
        $moment->setHeureDebut(10);
        $moment->setHeureFin(18);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_QUATRE));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(8);
        $moment->setHeureFin(12);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_QUATRE));
        $moment->setJour('samedi');
        $moment->setHeureDebut(14);
        $moment->setHeureFin(23);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_CINQ));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(7);
        $moment->setHeureFin(9);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_CINQ));
        $moment->setJour('samedi');
        $moment->setHeureDebut(7);
        $moment->setHeureFin(13);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_SIX));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(14);
        $moment->setHeureFin(18);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_SIX));
        $moment->setJour('samedi');
        $moment->setHeureDebut(10);
        $moment->setHeureFin(23);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_SEPT));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(16);
        $moment->setHeureFin(18);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_SEPT));
        $moment->setJour('samedi');
        $moment->setHeureDebut(10);
        $moment->setHeureFin(15);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_HUIT));
        $moment->setJour('vendredi');
        $moment->setHeureDebut(19);
        $moment->setHeureFin(21);
        $manager->persist($moment);

        $moment = new Moment();
        $moment->setIdMembre($this->getReference(MembreFixtures::MEMBRE_HUIT));
        $moment->setJour('samedi');
        $moment->setHeureDebut(11);
        $moment->setHeureFin(17);
        $manager->persist($moment);

        $manager->flush();
    }
}
