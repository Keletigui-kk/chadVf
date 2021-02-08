<?php

namespace App\Form;

use App\Entity\Infos;
use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ModifierProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('birthday',BirthdayType::class)
            ->add('lieudenaissance',TextType::class)
            ->add('adresse',TextType::class)
            ->add('codepostale',NumberType::class)
            ->add('ville',TextType::class)
            ->add('pays',TextType::class)
            ->add('tel',TelType::class)
            ->add('metier',TextType::class)
            ->add('lieudetravail', TextType::class)
            ->add('parcoursprof',TextareaType::class)
            ->add('parcoursscolaire',TextareaType::class)
            ->add('nationalite',TextType::class)
            ->add('civilite',ChoiceType::class,[
                'label' => 'Civilité',
                'help' => 'Veuillez choisir votre situation',
                'choices' => [
                    'Marié(e)' => 'Marié(e)',
                    'Célibataire' => 'Célibataire',
                    'Divorcé(e)' => 'Divorcé(e)',
                    'Séparé(e)' => 'Séparé(e)',
                    'Pacsé(e)' => 'Pacsé(e)',
                    'Veuf(ve)' => 'Veuf(ve)'
                ],
                
            ])
            // ->add('isActivate')
            ->add('codepostale',NumberType::class,[
                'label' => 'Code postale',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('imageFile', VichImageType::class)
            // ->add('users',EntityType::class,[
            //     'label' => 'Id du user',
            //     'class' => Users::class
            // ])
            // ->add('category')
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Infos::class
        ]);
    }
}