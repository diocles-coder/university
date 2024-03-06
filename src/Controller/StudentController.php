<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;

use App\Repository\StudentRepository;

use Doctrine\ORM\EntityManagerInterface;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="app_student")
     */
    public function index(StudentRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $students= $paginator->paginate(
            $repository->findBy(array(), array('id' => 'desc')), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        ); ;
        
        return $this->render('student/index.html.twig', [
            'students' => $students
        ]);
    }

    #[Route('/student/nouveau', name:'student.new', methods: ['GET' , 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $student= new Student();

        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);

        if ($form->isSubmitted() &&  $form->isValid()){
            $em->persist($student);
            $em->flush();

            $this->addFlash(
                'info', "Le nouveau étudiant vient d'être ajouté"
               );
    
               return $this->redirectToRoute('app_student');
    
        }

     return $this->render('student/new.html.twig',[
        'form' => $form->createView()
     ]);
    }

    #[Route('/student/edition/{id}', name:'student.edit', methods: ['GET' , 'POST'])]
    public function update(StudentRepository $repository, int $id): Response
    {

       $student = $repository->findOneBy (["id" =>$id]);
       $form = $this->createForm(StudentType::class, $student);
       // if ($form->isSubmitted() &&  $form->isValid()){
       //     $em->persist($student);
       //     $em->flush();

        //    $this->addFlash(
        //        'info', "Le nouveau étudiant vient d'être ajouté"
        //       );
    
        //       return $this->redirectToRoute('app_student');
    
      //  }

     return $this->render('student/edit.html.twig',[
        'form' => $form->createView()
     ]);
    } 
















  /*
    #[Route('/student/nouveau', name:'student.new', methods: ['GET' , 'POST'])]
    public function new(
        Request $request,
        ManagerRegistry $doctrine
        
        ): Response
    {

       // $entityManager= $doctrine->getManager();

        $student = new student();
        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
           $student = $form-> getData();

           $manager = $doctrine->getManager();
           $manager->persist($student);
           $manager->flush();

           $this->addFlash(
            'info', "Le nouveau étudiant vient d'être ajouté"
           );

           return $this->redirectToRoute('app_student');

        }
 

        return $this->render('student/new.html.twig', [
            'form' => $form-> createView()
        ]);
    } */

     /*
    #[Route('/student/modifier/{id?0}', name:'student.edit', methods: ['GET' , 'POST'])]
    public function update(
        Student $student=null,
        Request $request,
        ManagerRegistry $doctrine
        
        ): Response
    {

       if (!$student){
         $student = new student();
       }

       
        
        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
           $student = $form-> getData();

           $manager = $doctrine->getManager();
           $manager->persist($student);
           $manager->flush();

           $this->addFlash(
            'info', "Le profil de l'étudiant vient d'être modifié"
           );

           return $this->redirectToRoute('app_student');

        }
 

        return $this->render('student/edit.html.twig', [
            'form' => $form-> createView()
        ]);
    } */ 


}
