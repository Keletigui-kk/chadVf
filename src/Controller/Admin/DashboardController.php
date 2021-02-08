<?php

namespace App\Controller\Admin;

use App\Entity\Infos;
use App\Entity\Users;
use App\Entity\Images;
use App\Entity\Categories;
use App\Entity\Evenements;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="chad_admin")
     */
    public function index(): Response
    {
        // return parent::index();
        # je rajoute 2 ligne pour aller directement sur le dashbord et pas avoir les détails du dashbordController dans mon admin
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        
        return $this->redirect($routeBuilder->setController(InfosCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // ->setTitle('Chapelle des adorateurs');
            ->setTitle('<img src="images/logochad.png" width="100px" > Chapelle des adorateurs');
    }
  


    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
         yield MenuItem::linkToCrud('Informations', 'fas fa-users', Infos::class);
         yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', Users::class);
         yield MenuItem::linkToCrud('Categories', 'fas fa-list', Categories::class);
         yield MenuItem::linkToCrud('Evenements', 'fas fa-calendar', Evenements::class);
    }
}