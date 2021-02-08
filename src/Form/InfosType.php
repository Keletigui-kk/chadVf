<?php

namespace App\Form;

use App\Entity\Infos;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
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

class InfosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prenom',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('birthday',BirthdayType::class,[
                'label' => 'Date de naissance',
            ])
            ->add('lieudenaissance',TextType::class,[
                'label' => 'Lieu de naissance',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('adresse',TextType::class,[
                'label' => 'Adresse',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])            
            ->add('codepostale',NumberType::class,[
                'label' => 'Code postale',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('ville',TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('pays',TextType::class,[
                'label' => 'Pays',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('tel',TelType::class,[
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('metier',TextType::class,[
                'label' => 'Metier',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('lieudetravail',TextType::class,[
                'label' => 'Lieu de travail',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('parcoursprof',TextareaType::class,[
                'label' => 'Parcours professionnelle',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('parcoursscolaire',TextareaType::class,[
                'label' => 'Parcours scolaire',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
            ->add('nationalite',TextType::class,[
                'label' => 'Nationalité',
                'required' => true,
                'invalid_message' => 'Le champ nationalité est requis',
                'attr' => [
                    'class' => 'form-control col-md-12'
                ],
            ])
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
            // on ajoute le cham images qui correspond à une entité liée à infos
            // ce champ n'est pas lié à la base de données donc mettre mapped à false
            ->add('imageFile', VichImageType::class)
            // ->add('category', EntityType::class,[
            //     'label' => 'Categorie',
            //     'class' => Category::class
            // ])
                
            ->add('Valider' , SubmitType::class)
            // ->add('Users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Infos::class,
        ]);
    }
}