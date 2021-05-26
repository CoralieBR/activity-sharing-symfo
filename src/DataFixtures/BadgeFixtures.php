<?php

namespace App\DataFixtures;

use App\Entity\Badge;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BadgeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $badge = new Badge();
        $badge->setTitre("Platine");
        $badge->setImage("");
        $badge->setDescription("Niveau Plateau");
        $badge->setValide(true);
        $manager->persist($badge);

        $badge = new Badge();
        $badge->setTitre("Or");
        $badge->setImage("");
        $badge->setDescription("Niveau Or");
        $badge->setValide(true);
        $manager->persist($badge);

        $badge = new Badge();
        $badge->setTitre("Argent");
        $badge->setImage("");
        $badge->setDescription("Niveau Argent");
        $badge->setValide(true);
        $manager->persist($badge);

        $badge = new Badge();
        $badge->setTitre("Bronze");
        $badge->setImage("");
        $badge->setDescription("Niveau Bronze");
        $badge->setValide(true);
        $manager->persist($badge);

        $manager->flush();
    }
}
