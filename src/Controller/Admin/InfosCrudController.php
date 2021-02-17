<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Infos::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id'),
            ChoiceField::new('civilitesexe', 'Civilité')
            ->setChoices([
                'Mme' => 'Mme',
                'Mlle' => 'Mlle',
                'Mr' => 'Mr'
            ]),
            TextField::new('nom', 'Nom'),
            TextField::new('prenom', 'Prenom'),
            BooleanField::new('isActivate', 'Activation'),
            BooleanField::new('adhesionPaid', 'Adhesion'),
            TelephoneField::new('tel','Telephone'),
            // DateField::new('birthday', 'Date de naissance'),
            // TextField::new('lieudenaissance', 'Lieu de naissance'),
            // TextField::new('adresse', 'Adresse'),
            // NumberField::new('codepostale', 'Code postale'),
            // TextField::new('ville', 'Ville'),
            // TextField::new('pays', 'Pays'),
            // TextField::new('metier', 'Metier'),
            // TextField::new('metier', 'Metier'),
            // TextareaField::new('parcoursprof', 'Parcours professionnel'),
            // TextareaField::new('parcoursscolaire', 'Parcours scolaire'),
            // TextField::new('nationalite', 'Nationalité'),
            // ChoiceField::new('civilite', 'Situation  familiale')
            //     ->setChoices([
            //         'Marié(e)'=> 'Marié(e)',
            //         'Célibataire'=> 'Célibataire',
            //         'Divorcé(e)' => 'Divorcé(e)',
            //         'Séparé(e)' => 'Séparé(e)',
            //         'Pacsé(e)' => 'Pacsé(e)',
            //         'Veuf(ve)' => 'Veuf(ve)'
            //     ]),
            AssociationField::new('category', 'Departements'),
            // ImageField::new('imageFile', 'Photo')
            //    ->setBasePath('images/')
            //    ->setUploadDir('public/images/users')
            //    ->setUploadedFileNamePattern('[randomhash].[extension]'),
         ];
    }

}