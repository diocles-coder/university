<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
           ->add('gender', EntityType::class, [
                'class'=> Gender::class,
               'choice_label'=>'name',
                
           ]) 
            ->add('lastname', TextType::class )
            ->add('firstname', TextType::class)
            ->add('email', EmailType::class)
            ->add('phonenumber', TextType::class)
            ->add('birthday', BirthdayType::class, [
                 'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    ]
                  ,
           ])            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
