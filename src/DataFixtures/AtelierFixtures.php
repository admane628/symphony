<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

use App\Entity\Atelier;

class AtelierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		$faker = Faker\Factory::create('fr_FR');
        
        $ateliers = Array();
	    for ($i = 0; $i < 8; $i++) {
		   $ateliers[$i] = new Atelier();
		   $ateliers[$i]->setNom($faker->sentence($nbWords = 6, $variableNbWords = true));
		   $ateliers[$i]->setDescription($faker->sentence($nbWords = 30, $variableNbWords = true));

		   $manager->persist($ateliers[$i]);
	    }

        $manager->flush();
    }
}
