<?php

namespace App\Controller;

use App\Entity\Gender;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GenderController extends AbstractController
{
    #[Route('/gender', name: 'app_gender')]
    public function addGender(ManagerRegistry $doctrine): Response
    {

       // $entityManager = $doctrine->getManager();
        
       // $gender1 = new Gender();
      //  $gender1->setName('male');
     //   $entityManager->persist($gender1);
     //   $gender2 = new Gender();
     //   $gender2->setName('female');
    //    $entityManager->persist($gender2);

    //    $entityManager->flush();

        return $this->render('start/index.html.twig', [
            
        ]);
    }
}
