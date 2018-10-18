<?php

namespace App\Repository;

use App\Entity\ArrivalZone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArrivalZone|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArrivalZone|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArrivalZone[]    findAll()
 * @method ArrivalZone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArrivalZoneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArrivalZone::class);
    }


    /**
     * @param ArrivalZone $arrivalZone
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(ArrivalZone $arrivalZone): void
    {
        $this->_em->persist($arrivalZone);
    }

    /**
     * @param ArrivalZone $arrivalZone
     * @throws \Doctrine\ORM\ORMException
     */
    public function remove(ArrivalZone $arrivalZone): void
    {
        $this->_em->remove($arrivalZone);
    }
//    /**
//     * @return ArrivalZone[] Returns an array of ArrivalZone objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArrivalZone
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
