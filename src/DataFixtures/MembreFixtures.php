<?php

namespace App\DataFixtures;

use App\Entity\Membre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreFixtures extends Fixture
{
    
    public const MEMBRE_MEMBRE = "membre";
    public const MEMBRE_SUPER_USER = "super-membre";
    public const MEMBRE_ADMIN = "admin";
    public const MEMBRE_UN = "un";
    public const MEMBRE_DEUX = "deux";
    public const MEMBRE_TROIS = "trois";
    public const MEMBRE_QUATRE = "quatre";
    public const MEMBRE_CINQ = "cinq";
    public const MEMBRE_SIX = "six";
    public const MEMBRE_SEPT = "sept";
    public const MEMBRE_HUIT = "huit";

    
    
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
    $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $membre = new Membre();
        $membre->setEmail('membre@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('membre');
        $membre->setPseudo('pseudo-membre');
        $membre->setGenre('non-binaire');
        $membre->setCp('38000');
        $membre->setVille('Grenoble');
        $membre->setPays('France');
        $membre->setLatitude('45.1877');
        $membre->setLongitude('5.7198');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_TENNIS));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_MEMBRE, $membre);

        $membre = new Membre();
        $membre->setEmail('admin@test.test');
        $membre->setRoles(["ROLE_ADMIN"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('admin');
        $membre->setPseudo('pseudo-admin');
        $membre->setGenre('non-binaire');
        $membre->setCp('69000');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7452');
        $membre->setLongitude('4.7910');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_ADMIN, $membre);

        $membre = new Membre();
        $membre->setEmail('super-membre@test.test');
        $membre->setRoles(["ROLE_SUPER_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('super-user');
        $membre->setPseudo('pseudo-super-user');
        $membre->setGenre('non-binaire');
        $membre->setCp('69000');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7452');
        $membre->setLongitude('4.7910');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_SUPER_USER, $membre);

        $membre = new Membre();
        $membre->setEmail('un@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('un');
        $membre->setPseudo('pseudo-un');
        $membre->setGenre('non-binaire');
        $membre->setCp('69001');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7706');
        $membre->setLongitude('4.8326');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_UN, $membre);

        $membre = new Membre();
        $membre->setEmail('deux@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('deux');
        $membre->setPseudo('pseudo-deux');
        $membre->setGenre('non-binaire');
        $membre->setCp('69002');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7486');
        $membre->setLongitude('4.8309');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_DEUX, $membre);

        $membre = new Membre();
        $membre->setEmail('trois@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('trois');
        $membre->setPseudo('pseudo-trois');
        $membre->setGenre('non-binaire');
        $membre->setCp('69003');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7559');
        $membre->setLongitude('4.8595');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_CINEMA));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_TROIS, $membre);

        $membre = new Membre();
        $membre->setEmail('quatre@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('quatre');
        $membre->setPseudo('pseudo-quatre');
        $membre->setGenre('non-binaire');
        $membre->setCp('69004');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7771');
        $membre->setLongitude('4.8258');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_QUATRE, $membre);

        $membre = new Membre();
        $membre->setEmail('cinq@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('cinq');
        $membre->setPseudo('pseudo-cinq');
        $membre->setGenre('non-binaire');
        $membre->setCp('69005');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7540');
        $membre->setLongitude('4.7990');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_CINQ, $membre);

        $membre = new Membre();
        $membre->setEmail('six@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('six');
        $membre->setPseudo('pseudo-six');
        $membre->setGenre('non-binaire');
        $membre->setCp('69006');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7653');
        $membre->setLongitude('4.8677');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_SIX, $membre);

        $membre = new Membre();
        $membre->setEmail('sept@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('sept');
        $membre->setPseudo('pseudo-sept');
        $membre->setGenre('non-binaire');
        $membre->setCp('69007');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7473');
        $membre->setLongitude('4.8418');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_THEATRE));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_SEPT, $membre);

        $membre = new Membre();
        $membre->setEmail('huit@test.test');
        $membre->setRoles(["ROLE_USER"]);
        $membre->setPassword($this->passwordEncoder->encodePassword($membre, 'pass'));
        $membre->setPrenom('huit');
        $membre->setPseudo('pseudo-huit');
        $membre->setGenre('non-binaire');
        $membre->setCp('69008');
        $membre->setVille('Lyon');
        $membre->setPays('France');
        $membre->setLatitude('45.7473');
        $membre->setLongitude('4.8658');
        $membre->setDistancekm(10);
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_YOGA));
        $membre->addActivite($this->getReference(ActiviteFixture::ACTIVITE_FOOTBALL));
        $manager->persist($membre);
        $this->addReference(self::MEMBRE_HUIT, $membre);

        $manager->flush();
    }
}
