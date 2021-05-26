<?php

namespace App\DataFixtures;

use App\Entity\Membre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreFixtures extends Fixture
{
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
        $manager->persist($membre);

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
        $manager->persist($membre);

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
        $manager->persist($membre);

        $manager->flush();
    }
}
