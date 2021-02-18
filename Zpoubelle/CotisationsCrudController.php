<?php

namespace App\Controller\Admin;

use App\Entity\Cotisations;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CotisationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cotisations::class;
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