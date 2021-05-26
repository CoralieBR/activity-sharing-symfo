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
        
        $manager->persist($moment);

        $manager->flush();
    }
}
