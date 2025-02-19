<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
	private $userPasswordHasher;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasher = $userPasswordHasherInterface;
    }
    
    public function load(ObjectManager $manager): void
    {
	   
       $user = new User();
	   $user->setNom("admin");
	   $user->setPrenom("admin");
	   $user->setRoles(["ROLE_ADMIN"]);
	   $user->setPassword($this->userPasswordHasher->hashPassword($user, "admin"));

	   $manager->persist($user);

       $manager->flush();
    }
}
