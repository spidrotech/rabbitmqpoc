<?php

namespace App\Repository;

use App\Entity\Strowberry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Strowberry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Strowberry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Strowberry[]    findAll()
 * @method Strowberry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StrowberryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Strowberry::class);
    }

    // /**
    //  * @return Strowberry[] Returns an array of Strowberry objects
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
    public function findOneBySomeField($value): ?Strowberry
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
