<?php

namespace App\Repository;

use App\Entity\ModelYearEngine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModelYearEngine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelYearEngine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelYearEngine[]    findAll()
 * @method ModelYearEngine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelYearEngineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelYearEngine::class);
    }

    // /**
    //  * @return ModelYearEngine[] Returns an array of ModelYearEngine objects
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
    public function findOneBySomeField($value): ?ModelYearEngine
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
