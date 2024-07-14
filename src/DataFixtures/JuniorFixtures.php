<?php

namespace App\DataFixtures;

use App\Entity\Junior;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class JuniorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $junior = new Junior();
        $junior->setAge(23);
        $junior->setFirstName('Mat');
        $junior->setLastName('C');
        $junior->setBio('bac');

        $manager->persist($junior);

        $manager->flush();
    }
}
