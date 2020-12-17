<?php

namespace App\Repository;

use App\Entity\CatFood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CatFood|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatFood|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatFood[]    findAll()
 * @method CatFood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatFoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatFood::class);
    }

    // /**
    //  * @return CatFood[] Returns an array of CatFood objects
    //  */
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
    public function findOneBySomeField($value): ?CatFood
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
