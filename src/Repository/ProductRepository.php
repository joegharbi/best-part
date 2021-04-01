<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\PartCar;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function getProductByPartCar($partCar)
    {

        $qb = $this->createQueryBuilder('p');
        $qb
            ->innerJoin('p.partCars','partCars')
            ->where('partCars = :_pc')
            ->setParameter('_pc', $partCar);
        return $qb->getQuery()->getResult();
    }
   public function getProductByCarId(int $carId)
    {

        $qb = $this->createQueryBuilder('p');
        $qb
            ->innerJoin('p.partCars','partCars')
            ->innerJoin('partCars.car','car')
            ->where('car.id = :_id')
            ->setParameter('_id', $carId);
        return $qb->getQuery()->getResult();
    }


    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
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
