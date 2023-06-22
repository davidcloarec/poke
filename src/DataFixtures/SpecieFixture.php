<?php

namespace App\DataFixtures;

use App\Entity\Specie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecieFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (\SpecieList::$species as $specieElement){
            $specie = new Specie();
            $specie->setNumero($specieElement['numero']);
            $specie->setName($specieElement['name']);
            $manager->persist($specie);
        }
        $manager->flush();
    }
}
