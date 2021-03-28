<?php

namespace App\Repository;

use App\Entity\MaterialMaster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaterialMaster|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaterialMaster|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaterialMaster[]    findAll()
 * @method MaterialMaster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialMasterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaterialMaster::class);
    }

    // /**
    //  * @return MaterialMaster[] Returns an array of MaterialMaster objects
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
    public function findOneBySomeField($value): ?MaterialMaster
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
