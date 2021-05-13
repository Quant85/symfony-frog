<?php

namespace App\Repository;

use App\Entity\Messaggio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Messaggio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Messaggio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Messaggio[]    findAll()
 * @method Messaggio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessaggioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Messaggio::class);
    }

    // /**
    //  * @return Messaggio[] Returns an array of Messaggio objects
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
    public function findOneBySomeField($value): ?Messaggio
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
