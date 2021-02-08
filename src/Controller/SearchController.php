<?php
 
namespace App\Controller;
 
use App\Classe\Search;
use App\Entity\Infos;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 
class SearchController extends AbstractController
{
    private $em;
 
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @Route("/search", name="search_users")
     */
    public function index(Request $request): Response
    {
        // Création du filtre permetant de rechercher un membre ou un département
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
         
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $info = $this->em->getRepository(Infos::class)->findWithSearch($search);
        }
        else{
            $info = $this->em->getRepository(Infos::class)->findAll();
        }
 
        return $this->render('search/index.html.twig', [ 
            'form' => $form->createView(),
            'infos' => $info
        ]);
    }
}