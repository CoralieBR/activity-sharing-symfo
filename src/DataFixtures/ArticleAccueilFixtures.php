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
        $articleAccueil->setImage('elevate-nygy58eb9aw-unsplash-60aa46bc38896732255472.jpg');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setImage('jannes-glas-0naqqslwlka-unsplash-60aa49fb5820b020914327.jpg');
        $articleAccueil->setActive(true);
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $articleAccueil = new ArticleAccueil();
        $articleAccueil->setTitre('Cooooool');
        $articleAccueil->setTexte('Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!! Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!! Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!! Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!! Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!! Avec Activity Sharing, fait du roller avec des inconnu.es et en un rien de temps vous deviendrez... une SUPER BANDE DE POTES !!!');
        $articleAccueil->setImage('felix-rostig-umv2wr-vbq8-unsplash-60aa52b0d5a23547759372.jpg');
        $articleAccueil->setActive(true);
        $articleAccueil->setBoutonTexte('truc');
        $articleAccueil->setBoutonLien('#');
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
        $articleAccueil->setImage('taylor-smith-selwwrpdkoc-unsplash-60aa4a3028f93048147348.jpg');
        $articleAccueil->setActive(true);
        $articleAccueil->setBoutonTexte('S\'inscrire');
        $articleAccueil->setBoutonLien('#');
        $articleAccueil->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($articleAccueil);

        $manager->flush();
    }
}
