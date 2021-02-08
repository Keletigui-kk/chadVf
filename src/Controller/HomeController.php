<?php

namespace App\Controller;

use App\Form\SearchUsersType;
use App\Repository\InfosRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            
        ]);
    }
}


    // /**
    //  * @Route("/", name="home")
    //  */
    // public function reherche(InfosRepository $infosRepo, Request $request)
    // {
    //     $info = $infosRepo->findBy(['isActivate' => true], ['id' => 'desc'], 5);

    //     $form = $this->createForm(SearchUsersType::class);
        
    //     $search = $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid()){
    //         // On recherche les annonces correspondant aux mots clés
    //         $info = $infosRepo->search(
    //             $search->get('mots')->getData(),
    //         );
    //     }

    //     return $this->render('home/index.html.twig', [
    //         'info' => $info,
    //         'form' => $form->createView()
    //     ]);
    // }