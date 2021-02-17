<?php

namespace App\Controller\Admin;

use App\Entity\Adhesions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdhesionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adhesions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IntegerField::new('id'),
            BooleanField::new('isPaid', 'Payement'),
            MoneyField::new('somme')->setCurrency('EUR')
        ];
    }
    
}