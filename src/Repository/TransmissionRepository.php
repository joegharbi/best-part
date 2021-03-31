<?php

namespace App\Repository;

use App\Entity\Model;
use App\Entity\Transmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Transmission|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transmission|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transmission[]    findAll()
 * @method Transmission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transmission::class);
    }

    public function getTransmissionByModel(Model $model)
    {

        $qb = $this->createQueryBuilder('t');
        $qb
            ->innerJoin('t.cars', 'c')
            ->where('c.model = :_model')
            ->setParameter('_model', $model);
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Transmission[] Returns an array of Transmission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Transmission
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
