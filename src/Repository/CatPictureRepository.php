<?php

namespace App\Repository;

use App\Entity\CatPicture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CatPicture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatPicture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatPicture[]    findAll()
 * @method CatPicture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatPictureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatPicture::class);
    }

    // /**
    //  * @return CatPicture[] Returns an array of CatPicture objects
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
    public function findOneBySomeField($value): ?CatPicture
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
