<?php

namespace App\Repository;

use App\Entity\Ruimte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ruimte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ruimte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ruimte[]    findAll()
 * @method Ruimte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RuimteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ruimte::class);
    }

    // /**
    //  * @return Ruimte[] Returns an array of Ruimte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ruimte
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
