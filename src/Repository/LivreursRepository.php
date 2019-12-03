<?php

namespace App\Repository;

use App\Entity\Livreurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
/**
 * @method Livreurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livreurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livreurs[]    findAll()
 * @method Livreurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreursRepository extends ServiceEntityRepository
{
  
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livreurs::class);
    }

//    /**
//     * @return Livreurs[] Returns an array of Livreurs objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Livreurs
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
