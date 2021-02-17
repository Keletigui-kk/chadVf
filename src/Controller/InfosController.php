<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Entity\Infos;
use App\Entity\Users;
use App\Classe\Search;
use App\Entity\Images;
use App\Form\InfosType;
use App\Entity\Adhesions;
use App\Form\SearchUsersType;
use App\Form\ModifierProfileType;
use App\Repository\InfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class InfosController extends AbstractController
{
    /**
     *  @var infosRepository
     */
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/infos", name="infos")
     */
    public function index(Request $request): Response
    {
        return $this->render('infos/index.html.twig', [
            // on retourne juste le twig pour afficher le profl du user: il faut aller enlever le contenu du twig(templates/infos/index.html.twig) consernant le contoleur et mettre à la place les infos du profil
            // 'controller_name' => 'InfosController',
        ]);
    } 
      
     /**
     * @Route("/infos/details", name="infos_details")
     */
    public function infosDetails(): Response
    {
        return $this->render('infos/detailsProfil.html.twig', [
            // on retourne juste le twig pour afficher le profl du user: il faut aller enlever le contenu du twig(templates/infos/index.html.twig) consernant le contoleur et mettre à la place les infos du profil
            // 'controller_name' => 'InfosController',
        ]);
    }



    /**
     * @Route("/infos/faq", name="infos_faq")
     */
    public function faq(): Response
    {
        return $this->render('infos/faq.html.twig', [
            // on retourne juste le twig pour afficher le profl du user: il faut aller enlever le contenu du twig(templates/infos/index.html.twig) consernant le contoleur et mettre à la place les infos du profil
            // 'controller_name' => 'InfosController',
        ]);
    } 


    /**
    * @Route("/infos/ajout", name="infos_ajout")
    */
    public function nouveauUserClassTraitement(Request $request): Response
    {
        $info = new Infos();

        $form = $this->createForm(InfosType::class, $info);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
           
            
            
            // # gestion de mes images: on récupère les images transmises 
            // $images = $form->get('images')->getData();
            //  if($images){
            //       # on générere un nouveau nom de fichier pour éviter que les images aient le même nom
            //       $fichier = md5(uniqid()) . '.' . $images->guessExtension();    # uniqid est basé sur le temps; la méthode guessExtension(); permet de rajouter une extension à l'image
                  
                  
            //         try{
            //             # on copie le fichier dans le dossier uploads avec la méthode move
            //             $images->move(
            //             $this->getParameter('images_directory'),  # la destination de l'image: images_directory = parametre consigné dans le fichier service.yaml
            //             $fichier  # le fichier
            //         );
            //     } catch (FileException $entityManager) {
                    
            //     }

            //     # on stock l'image dans la base dedonnée(le nom de l'image: car l'image elle même est stocké sur le disc)
            //     # on fait une nouvelle instance de notre image 
            //     $img = new Images();
            //     $img->setNom($fichier); # on recupere le nom de l'image qui correspond à notre fichier: ici $fichier   
            //     $info->setImages($img); # on ajoute une image à l'entité infos
            //  }

             
            
             $info = $form->getData();
            
            // on recupére le nom de l'utilisateur connecté
            $info->setUsers($this->getUser());
           
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($info);
            $entityManager->flush();

            return $this->redirectToRoute('infos'); # je redirige vers la page de profil
        }

        return $this->render('infos/ajout.html.twig', [
        'form' => $form->createView(),
        
        ]);
    }

    

    
    /**
    * @Route("/modif/infos/{id}", name="modif_infos")
    */
    public function usersModif(Infos $info, Request $request): Response  # l'id correspond à une entité Users $users(on aurait pu mettre $id aussi): c'est le param converter qui permet de faire ça
    {
        //  dd($request);
    // dd($info);  # Je fais un dump pour verifier si ça marche bien

    $form = $this->createForm(ModifierProfileType::class, $info);

    # on verifie si le formulaire à été soumis ou pas
    $form->handleRequest(($request));

    if($form->isSubmitted() && $form->isValid()){

        // dd($users);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($info);
        $entityManager->flush();
        
        $this->addFlash('message','Profile mis à jour avec succès ');  # message à afficher à la mise à jour du profile
        return $this->redirectToRoute('infos', ['id' => $info->getId()]);
    }

        return $this->render('infos/modifierProfile.html.twig', [
        'form' => $form->createView()
        ]);
    }

       
    
    # Modification de mot de passe
    /**
    * @Route("/users/passe/modifier", name="users_pass_modifier")
    */
    public function usersPassModifier(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response  # l'id correspond à une entité Users $users(on aurait pu mettre $id aussi): c'est le param converter qui permet de faire ça
    {
        if($request->isMethod('POST')){  # on verifie qu'on est en méthode post
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            # on vérifie si les 2 mot de passe sont identiques
            if($request->request->get('pass') == $request->request->get('pass2')){
                $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('pass')));  # on le lui passe le nom de l'utilisateur et le mot de passe
                $em->flush();  # on fait un flush pour mettre à jour la base de données
                $this->addFlash('message', 'Mot de passe mis à jour avec succès');

                return $this->redirectToRoute('infos');
            }else{
                $this->addFlash('error','Les deux mots de passe ne sont pas identiques');
            }
        }
        
        return $this->render('infos/editMotDePasse.html.twig');
    }




    # generation d'un fichier pdf
    
    /**
    * @Route("/pdf", name="infos_pdf", methods={"GET"})
    */
    public function pdf(InfosRepository $infosRepository): Response
    {
        # code concernant le dompdf
        
         // Configure Dompdf according to your needs
         $pdfOptions = new Options();
         $pdfOptions->set('defaultFont', 'Arial');
         
         // Instantiate Dompdf with our options
         $dompdf = new Dompdf($pdfOptions);
         $infosPdf = $infosRepository->findAll();
         
         return $this->render('infos/pdf.html.twig', [
            'infos' => $infosPdf,
         ]);
         
         // Retrieve the HTML generated in our twig file
         $html = $this->renderView('infos/pdf.html.twig', [
            'infos' => $infosPdf,
         ]);
         
         
         
         // Load HTML to Dompdf
         $dompdf->loadHtml($html);
         
         // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
         $dompdf->setPaper('A4', 'portrait');
 
         // Render the HTML as PDF
         $dompdf->render();
 
         // Output the generated PDF to Browser (force download)
         $dompdf->stream("mypdf.pdf", [
             "Attachment" => true
         ]);
    }
     
}