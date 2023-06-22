<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (\TypeList::$types as $typesElement){
            $type = new Type();
            $type->setName($typesElement['name']);
            $manager->persist($type);
        }
        $manager->flush();
    }
}
