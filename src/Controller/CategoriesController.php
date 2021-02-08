<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Form\CategoriesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index(): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
        ]);
    }
    # je crée une autre route 
    /**
     * @Route("/categories/ajout", name="categories_ajout")
     */
    public function ajoutcategories(Request $request): Response  # pour gerer un formulaire il est nécessaire d'avoir l'ojet request
    {
        # je crée unE nouvelle categorie
        $category = new Categories;
        
         # je crée un formulaire
         $form = $this->createForm(CategoriesType::class, $category);

          # je traite le formulaire
          
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //  # on recupére le nom de l'utilisateur connecté
            // $category->setUsers($this->getUser());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            # on redirige vers la route home
            return $this->redirectToRoute('home');
        }
          return $this->render('categories/ajout.html.twig',[
              'form' => $form->createView()
          ]);
         
    }
}