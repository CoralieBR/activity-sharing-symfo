<?php

namespace App\DataFixtures;

use App\Entity\ActiviteCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\ActiviteCategorie as EntityActiviteCategorie;

class ActiviteCategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $activiteCategorie = new ActiviteCategorie();
        $activiteCategorie->setNomCategorie("Activités Sportives");
        $activiteCategorie->setDescription("Pratiquer un sport régulièrement, faire de l’escalade en allant en montagne, participer à un rallye, faire du skate, partir à la découverte d’un sous-bois en VTT, faire du jogging, devenir skipper sur un voilier, partir avec des amis en weekend de chasse ou de pêche, ou encore vaincre ses limites en pratiquant un sport à sensation tel que le parachutisme ou le rafting");
        $activiteCategorie->setValide(true);
        $manager->persist($activiteCategorie);

        $activiteCategorie = new ActiviteCategorie();
        $activiteCategorie->setNomCategorie("Loisirs");
        $activiteCategorie->setDescription("Les activités physiques sont une forme courante de divertissement, une source de bien-être et un important vecteur de développement de la condition physique et de la santé physique et mentale. ");
        $activiteCategorie->setValide(true);
        $manager->persist($activiteCategorie);

        $activiteCategorie = new ActiviteCategorie();
        $activiteCategorie->setNomCategorie("Bien-être / Détente");
        $activiteCategorie->setDescription("La fatigue et le stress vous gagne ? Découvrez comment vous détendre, vous ressourcer, lutter contre le stress et assurer votre bien-être en prenant soin de votre corps et de votre esprit en suivant tous nos conseils qui font du bien");
        $activiteCategorie->setValide(true);
        $manager->persist($activiteCategorie);

        $activiteCategorie = new ActiviteCategorie();
        $activiteCategorie->setNomCategorie("Arts / Culture");
        $activiteCategorie->setDescription("Les personnalités à profil urbain profiteront de leurs loisirs culturels  pour baguenauder dans les musées, se joindre à une troupe de théâtre, se déguiser avec les enfants, ou danser et s’éclater la nuit venue…");
        $activiteCategorie->setValide(true);
        $manager->persist($activiteCategorie);


        $manager->flush();
    }
}
