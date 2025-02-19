<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

use App\Entity\Atelier;
use App\Entity\User;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AtelierFixtures extends Fixture
{
	private $userPasswordHasher;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasher = $userPasswordHasherInterface;
    }
    
    public function load(ObjectManager $manager): void
    {
		$faker = Faker\Factory::create('fr_FR');
		        
        $ateliers = Array();
	    for ($i = 0; $i < 8; $i++) {
		   $ateliers[$i] = new Atelier();
		   $ateliers[$i]->setNom($faker->sentence($nbWords = 6, $variableNbWords = true));
		   $ateliers[$i]->setDescription($faker->sentence($nbWords = 30, $variableNbWords = true));
		   
		   $user = new User();
		   $user->setNom("nom " . $i);
		   $user->setPrenom("prenom " . $i);
		   $user->setRoles(["ROLE_INSTRUCTEUR"]);
		   $user->setPassword($this->userPasswordHasher->hashPassword($user, "secret"));

		   $manager->persist($user);
		   
		   $ateliers[$i]->setInstructeur($user);
		   $manager->persist($ateliers[$i]);
	    }

        $manager->flush();
    }
}
