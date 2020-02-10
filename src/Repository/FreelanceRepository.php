<?php

namespace App\Repository;

use App\Entity\Freelance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Freelance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Freelance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Freelance[]    findAll()
 * @method Freelance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FreelanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Freelance::class);
    }

    // /**
    //  * @return Freelance[] Returns an array of Freelance objects
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
    public function findOneBySomeField($value): ?Freelance
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
