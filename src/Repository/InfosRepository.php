<?php

namespace App\Repository;

use App\Entity\Infos;
use App\Classe\Search;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Infos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Infos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Infos[]    findAll()
 * @method Infos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Infos::class);
    }


    // # methode qui permet de gerer la recherche 
    // /**
    //  * Recherche des infos des users en fonction du formulaire
    //  * @return void
    //  */
    // public function search($mots){
    //     $query = $this->createQueryBuilder('i');  # i pour infos 
    //     $query->where('i.isActivate = 1');  # on fait un where par ce qu'on veut les personnes activent
    //     # on ajoutes les mots 
    //     if($mots !== null){
    //         $query->andWhere('MATCH_AGAINST(i.nom, i.prenom, i.imageName) AGAINST(:mots boolean)>0')
    //             ->setParameter('mots', $mots);  # le >0 c'est pour vérifier si on à une réponse
    //     }

    //     return $query->getQuery()->getResult();
    // }

    
  /**
   * Requete qui me permet de faire récuperer les produits en fonction de la recherche de l'utilisateur
   * @return Infos[]
   */
  public function findWithSearch(Search $search)
  {
      $query = $this
          ->createQueryBuilder('infos')
          ->select('c', 'infos')
          ->join('infos.category', 'c');

      if(!empty($search->departements)){
          $query = $query
              ->andWhere('c.nom IN (:departements)')   
              ->setParameter('departements', $search->departements);
      }

      if(!empty($search->string)){
          $query = $query
              ->andWhere('
                  infos.nom LIKE :string 
                  OR infos.prenom LIKE :string 
                  OR infos.nom LIKE :string
              ')
              ->setParameter('string', "%{$search->string}%");
      }
      return $query->getQuery()->getResult();
  }

 /*

    // /**
    //  * @return Infos[] Returns an array of Infos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Infos
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}