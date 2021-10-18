<?php

namespace App\Repository;

use App\Entity\Systeem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Systeem|null find($id, $lockMode = null, $lockVersion = null)
 * @method Systeem|null findOneBy(array $criteria, array $orderBy = null)
 * @method Systeem[]    findAll()
 * @method Systeem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SysteemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Systeem::class);
    }

    // /**
    //  * @return Systeem[] Returns an array of Systeem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Systeem
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
