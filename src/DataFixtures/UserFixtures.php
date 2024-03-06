<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       // $faker = Factory::create('fr_FR');
     //   for ($i = 0; $i < 100; $i++) {
        
     //    $user = new User();
     //    $user->setFirstname($faker->firstName);
     //    $user->setLastname($faker->lastName);
    //     $user->setPhonenumber($faker->phoneNumber);
     //    $user->setEmail($faker->email);
    //     $user->setPassword($faker->password);

     //    $manager->persist($user);

        
     //   }
     //   $manager->flush();
    }    
}
