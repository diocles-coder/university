<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$faker = Factory::create('fr_FR');
        
      //  for ($i = 0; $i < 100; $i++){
      //      $student= new Student();

      //      $student->setFirstname($faker->firstName);
      //      $student->setLastname($faker->lastName);
      //      $student->setPhonenumber($faker->phoneNumber);
      //      $student->setEmail($faker->email);
      //      $student->setGender($faker->randomElement(['male', 'female']));
     //       $student->setBirthday($faker->dateTimeBetween($startDate = '-60 years', $endDate = '-20', $timezone = null));
        

      //      $manager->persist($student);
     //   }
        // $product = new Product();
        // $manager->persist($product);

      //  $manager->flush();
    }
}
