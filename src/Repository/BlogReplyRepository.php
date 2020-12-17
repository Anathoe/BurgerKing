<?php

namespace App\Repository;

use App\Entity\BlogReply;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlogReply|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogReply|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogReply[]    findAll()
 * @method BlogReply[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogReplyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogReply::class);
    }

    // /**
    //  * @return BlogReply[] Returns an array of BlogReply objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlogReply
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
