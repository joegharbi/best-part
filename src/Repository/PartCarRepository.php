<?php

namespace App\Repository;

use App\Entity\PartCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartCar[]    findAll()
 * @method PartCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartCarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartCar::class);
    }

    // /**
    //  * @return PartCar[] Returns an array of PartCar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PartCar
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
