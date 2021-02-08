<?php

namespace App\Controller\Admin;

use App\Entity\Evenements;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
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
            TextField::new('description','Description'),
            DateField::new('datedebut','Date de début'),
            DateField::new('datefin','Date de fin')
        ];
    }
    
}