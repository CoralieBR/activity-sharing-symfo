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
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $manager->flush();
    }
}
