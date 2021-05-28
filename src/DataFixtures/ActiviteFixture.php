<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActiviteFixture extends Fixture
{

    public const ACTIVITE_FOOTBALL = "Football";
    public const ACTIVITE_TENNIS = "Tennis";
    public const ACTIVITE_GOLF = "Golf";
    public const ACTIVITE_VELO = "Vélo";
    public const ACTIVITE_RUNNING = "Running";
    public const ACTIVITE_YOGA = "Yoga";
    public const ACTIVITE_MEDITATION = "Méditation";
    public const ACTIVITE_CINEMA = "Cinéma";
    public const ACTIVITE_DANSE = "Danse";
    public const ACTIVITE_THEATRE = "Theatre";

    public function load(ObjectManager $manager)
    {
        $activite = new Activite();
        $activite->setNomActivite("Football");
        $activite->setDescription("Retrouvez toute l'actualité du football en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_FOOTBALL, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Tennis");
        $activite->setDescription("Retrouvez toute l'actualité du tennis en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_TENNIS, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Golf");
        $activite->setDescription("Retrouvez toute l'actualité du golf en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_GOLF, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Vélo");
        $activite->setDescription("Retrouvez toute l'actualité du vélo en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_VELO, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Running");
        $activite->setDescription("Retrouvez toute l'actualité du running en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_RUNNING, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Yoga");
        $activite->setDescription("Retrouvez toute l'actualité du yoga en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_YOGA, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Méditation");
        $activite->setDescription("Retrouvez toute l'actualité du  en direct sur L'Équipe. Découvrez toutes les dernières informations, résultats et classements sur tous les championnats,");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_MEDITATION, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Cinéma");
        $activite->setDescription("Retrouvez toute l'actualité du cinéma en direct. Découvrez toutes les dernières informations.");
        $activite->setValide("");
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_CINEMA, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Danse");
        $activite->setDescription("Retrouvez toute l'actualité de la danse en direct sur L'Équipe. Découvrez toutes les dernières informations");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_DANSE, $activite);
        //
        $activite = new Activite();
        $activite->setNomActivite("Théatre");
        $activite->setDescription("Retrouvez toute l'actualité du théatre en direct sur L'Équipe. Découvrez toutes les dernières informations");
        $activite->setValide(true);
        $manager->persist($activite);
        $this->addReference(self::ACTIVITE_THEATRE, $activite);

        $manager->flush();
    }
}
