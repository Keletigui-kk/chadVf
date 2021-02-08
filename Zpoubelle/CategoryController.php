<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
    # je crée une autre route 
    /**
     * @Route("/category/ajout", name="category_ajout")
     */
    public function ajoutcategory(Request $request): Response  # pour gerer un formulaire il est nécessaire d'avoir l'ojet request
    {
        # je crée unE nouvelle categorie
        $category = new Category;
        
         # je crée un formulaire
         $form = $this->createForm(CategoryType::class, $category);

          # je traite le formulaire
          
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
             # on recupére le nom de l'utilisateur connecté
            $category->setUser($this->getUser());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            # on redirige vers la route home
            return $this->redirectToRoute('home');
        }
          return $this->render('category/ajout.html.twig',[
              'form' => $form->createView()
          ]);
         
    }
}