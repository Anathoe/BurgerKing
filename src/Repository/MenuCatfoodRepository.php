<?php

namespace App\Repository;

use App\Entity\MenuCatfood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MenuCatfood|null find($id, $lockMode = null, $lockVersion = null)
 * @method MenuCatfood|null findOneBy(array $criteria, array $orderBy = null)
 * @method MenuCatfood[]    findAll()
 * @method MenuCatfood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuCatfoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MenuCatfood::class);
    }

    // /**
    //  * @return MenuCatfood[] Returns an array of MenuCatfood objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MenuCatfood
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
