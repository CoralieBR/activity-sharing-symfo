<?php

namespace App\DataFixtures;

use App\Entity\Groupe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GroupeFixtures extends Fixture
{
    public const GROUPE_YOGA = "Groupe Yoga";
    public const GROUPE_THEATRE = "Groupe Théatre";
    public const GROUPE_CINEMA = "Groupe Cinema";
    public const GROUPE_TENNIS = "Groupe Tennis";
    public const GROUPE_FOOT = "Groupe Foot";
    

    public function load(ObjectManager $manager)
    {
        $groupe = new Groupe();
        $groupe->setNomGroupe('Yoga sur péniche');
        $groupe->setDate( new \DateTime('2021-06-05'));
        $groupe->setJour('lundi');
        $groupe->setHeureDebut('14');
        $groupe->setHeureFin('15');
        $groupe->setCp('69000');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('45.44');
        $groupe->setLongitude('4.5');
        $groupe->setValide(true);
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        // $groupe->setCreepar($this->getReference(MembreFixtures::MEMBRE_SUPER_USER));
        $groupe->setDescription('Les bienfaits de l’eau combinés avec ceux du yoga ne sont que bénéfiques pour le corps et l’esprit. Le yoga aquatique permet également de surmonter la peur de l’eau. Cette pratique aide à faire un travail sur soi grâce à une série d’exercices et de figures.');
        $manager->persist($groupe);
        $this->addReference(self::GROUPE_YOGA, $groupe);

        $groupe = new Groupe();
        $groupe->setNomGroupe('Théatre au parc');
        $groupe->setDate(new \DateTime('2021-06-18'));
        $groupe->setJour('mardi');
        $groupe->setHeureDebut('9');
        $groupe->setHeureFin('11');
        $groupe->setCp('69001');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('45.20');
        $groupe->setLongitude('4.5');
        $groupe->setValide(true);
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        // $groupe->setCreepar($this->getReference(MembreFixtures::MEMBRE_SUPER_USER));
        $groupe->setDescription("Du théâtre en plein air à Paris
        Théâtre, cirques, marionnettes... au détour d'une promenade, profitez des représentations en plein air !
        
        L’été, les troubadours des temps modernes descendent dans les parcs et les jardins. Pièces de théâtre, numéros de cirque, performances, spectacles de marionnettes… Au détour d’une promenade, profitez des représentations en plein air !");
        $manager->persist($groupe);
        $this->addReference(self::GROUPE_THEATRE, $groupe);

        $groupe = new Groupe();
        $groupe->setNomGroupe('Cinema Rex');
        $groupe->setDate(new \DateTime('2021-06-09'));
        $groupe->setJour('mercredi');
        $groupe->setHeureDebut('45.4');
        $groupe->setHeureFin('4.6');
        $groupe->setCp('69002');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide(true);
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        // $groupe->setCreepar($this->getReference(MembreFixtures::MEMBRE_SUPER_USER));
        $groupe->setDescription("Le film d'aventures ou film d'aventure (au singulier) est un genre cinématographique caractérisé par la présence d'un héros fictif ou non, tirant son statut du mythe qu'il inspire, l'action particulière qui s'y déroule, l'emploi de décors particuliers également, parfois le décalage temporel par rapport au contemporain ainsi que, parfois, les invraisemblances voulues caractérisant ainsi son excentricité, le tout véhiculant une idée générale de dépaysement1. Le film d'aventures a des frontières très larges puisqu'il englobe d'autres genres cinématographiques comme le western et la science-fiction1. ");
        $manager->persist($groupe);
        $this->addReference(self::GROUPE_CINEMA, $groupe);

        $groupe = new Groupe();
        $groupe->setNomGroupe('Tennis amateur');
        $groupe->setDate(new \DateTime('2021-06-12'));
        $groupe->setJour('jeudi');
        $groupe->setHeureDebut('46');
        $groupe->setHeureFin('4');
        $groupe->setCp('69003');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('4');
        $groupe->setLongitude('8');
        $groupe->setValide(true);
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_TENNIS));
        // $groupe->setCreepar($this->getReference(MembreFixtures::MEMBRE_ADMIN));
        $groupe->setDescription("Le film d'aventures ou film d'aventure (au singulier) est un genre cinématographique caractérisé par la présence d'un héros fictif ou non, tirant son statut du mythe qu'il inspire, l'action particulière qui s'y déroule, l'emploi de décors particuliers également, parfois le décalage temporel par rapport au contemporain ainsi que, parfois, les invraisemblances voulues caractérisant ainsi son excentricité, le tout véhiculant une idée générale de dépaysement1. Le film d'aventures a des frontières très larges puisqu'il englobe d'autres genres cinématographiques comme le western et la science-fiction1. ");
        $manager->persist($groupe);
        $manager->flush();
        $this->addReference(self::GROUPE_TENNIS, $groupe); 

        $groupe = new Groupe();
        $groupe->setNomGroupe('Foot 2 rue');
        $groupe->setDate(new \DateTime('2021-06-25'));
        $groupe->setJour('vendredi');
        $groupe->setHeureDebut('15');
        $groupe->setHeureFin('18');
        $groupe->setCp('69004');
        $groupe->setVille('Lyon');
        $groupe->setPays('France');
        $groupe->setLatitude('45.3');
        $groupe->setLongitude('4.9');
        $groupe->setValide(true);
        $groupe->setActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        // $groupe->setCreepar($this->getReference(MembreFixtures::MEMBRE_ADMIN));
        $groupe->setDescription("Le football de rue ou foot de rue ou street soccer est un sport urbain, une variante informelle du football qui se joue dans la rue ou à autre endroit à cinq contre cinq. Les buts sont représentés par des objets naturels. Il peut être pratiqué n'importe où, cependant, des « citystades » offrent des installations de bonne qualité pour jouer.");
        $manager->persist($groupe);
        $manager->flush();
        $this->addReference(self::GROUPE_FOOT, $groupe);
    }
}

            