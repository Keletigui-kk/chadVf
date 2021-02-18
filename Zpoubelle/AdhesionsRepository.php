<?php

namespace App\Repository;

use App\Entity\Adhesions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Adhesions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adhesions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adhesions[]    findAll()
 * @method Adhesions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdhesionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adhesions::class);
    }

    // /**
    //  * @return Ahesions[] Returns an array of Ahesions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ahesions
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}