<?php

namespace App\Repository;

use App\Entity\ModelYearEngineTransmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModelYearEngineTransmission|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelYearEngineTransmission|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelYearEngineTransmission[]    findAll()
 * @method ModelYearEngineTransmission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelYearEngineTransmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelYearEngineTransmission::class);
    }

    // /**
    //  * @return ModelYearEngineTransmission[] Returns an array of ModelYearEngineTransmission objects
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
    public function findOneBySomeField($value): ?ModelYearEngineTransmission
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
