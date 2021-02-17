<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenements::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id','Id'),
            TextField::new('titre','Titre'),
            TextareaField::new('description','Description'),
            DateTimeField::new('datedebut','Date de début'),
            DateTimeField::new('datefin','Date de fin'),
            TextField::new('lieu', 'Lieu'),
        ];
    }
    
}