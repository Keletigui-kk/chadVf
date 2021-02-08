<?php

namespace App\Controller;

use App\Entity\Infos;
use App\Form\InfosType;
use App\Repository\InfosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


class InfosController extends AbstractController
{
    /**
     * @Route("/infos", name="infos")
     */
    public function index(): Response
    {
        return $this->render('infos/index.html.twig', [
            // on retourne juste le twig pour afficher le profl du user: il faut aller enlever le contenu du twig(templates/infos/index.html.twig) consernant le contoleur et mettre à la place les infos du profil
            // 'controller_name' => 'InfosController',
        ]);
    }

    /**
     * @Route("/infos/ajout", name="infos_ajout", methods={"GET"})      # route pour la création des infos
     */
    public function ajoutInfos(Request $request): Response # pour gerer un formulaire il est nécessaire d'avoir l'ojet request
    {
        //  dd($request->attributes->all());
        # je crée une nouvelle info
        $info = new Infos;
        # exemple pour préremplri un formulaire
        $info->setNom("Exemple de nom")
             ->setPrenom("Exemple de prenom"); 

         # je crée un formulaire
        $form = $this->createForm(InfosType::class, $info);

         # je traite le formulaire
         $form->handleRequest($request);
                
         # conditions si le formulaire est soumis et validé
         if($form->isSubmitted() && $form->isValid()){
             
             # on recupère  les images 
             $photo = $form->get('photo')->getData();
             
             // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
             if($photo){
                 # on générere un nouveau nom de fichier pour éviter que les images aient le même nom
                 $fichier = md5(uniqid()) . '.' . $photo->guessExtension();    # uniqid et basé sur le temps; la méthode guessExtension(); permet de rajouter une extension
                 
                 
                 try{
                        # on copie le fichier dans le dossier uploads avec la méthode move
                        $photo->move(
                        $this->getParameter('images_directory'),  # la destination de l'image: images_directory = parametre consigné dans le fichier service.yaml
                        $fichier  # le fichier
                    );
                } catch (FileException $em) {
                    
                }
                $info->setPhoto($fichier);
                
                //  # on stock l'image dans la base dedonnée(le nom de l'image: car l'image elle même est stocké sur le disc)
                //  # on crée une nouvelle instance de Infos
                //  $img = new Infos();
                //  $img->setPhoto($fichier);

                 //  # on recupére le nom de l'utilisateur connecté
            //  $info->setUsers($this->getUser());
           
          
                $em = $this->getDoctrine()->getManager();
                $em->persist($info);
                $em->flush();
             }
           
            

            //  # on redirige vers la route infos
             
            //  return $this->redirectToRoute('infos',['id'=> $info->getId()]);   # ['id'=>$info->getId()]: pour recuperer l'id de l'infos
         }
         
        return $this->render('infos/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    
    
    # Exemple4: Modification du formulaire
    /**
    * @Route("/infos/{id}", name="infos_modif", methods={"GET"})
     */
    public function usersModif(Infos $infos, Request $request, EntityManagerInterface $entityManager): Response  # l'id correspond à une entité Users $users(on aurait pu mettre $id aussi): c'est le param converter qui permet de faire ça
    {

        //    dd($infos);  # Je fais un dump pour verifier si ça marche bien
         dd($infos);
        

        // dd($infos);

        $form = $this->createForm(InfosType::class, $infos);
            # on verifie si le formulaire à été soumis ou pas
        $form->handleRequest(($request));

        if($form->isSubmitted() && $form->isValid()){
            // dd($users);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infos);
            $entityManager->flush();
        
        }
    
        return $this->render('users/modifierProfile.html.twig', [
        // 'users' => $users,
        'form' => $form->createView(),
        
        ]);
    
    }
}