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
        $evenements = $this->em->getRepository(Evenements::class)->findAll();
        return $this->render('evenements/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }
}