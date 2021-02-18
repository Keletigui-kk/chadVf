<?php

namespace App\Controller;

use App\Entity\Evenements;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementsController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    
    /**
     * @Route("/evenements", name="evenements")
     */
    public function index(): Response
    {
        // $evenements = $this->em->getRepository(Evenements::class)->findAll();
        $evenements = $this->em->getRepository(Evenements::class)->findBy(
            [],                    # Un tableau (ici vide) permettant de préciser les critères de filtre (équivalent WHERE en SQL)
            ['id' => 'desc'],     # Un tableau, optionnel, contenant les critères de tri (équivalent ORDER BY en SQL), ici un tri décroissant sur id
            1                     # permet de limiter le nombre de résultats à afficher (équivalent LIMIT en SQL)
        );
        return $this->render('evenements/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}