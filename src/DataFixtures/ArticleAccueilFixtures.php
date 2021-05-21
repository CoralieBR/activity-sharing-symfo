<?php

namespace App\DataFixtures;

use App\Entity\ArticleAccueil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleAccueilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Ta super bande de potes');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        

        $manager->persist($articleAccueil);

        $manager->flush();
    }
}
