<?php

namespace App\Repository;

use App\Entity\Support;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Support|null find($id, $lockMode = null, $lockVersion = null)
 * @method Support|null findOneBy(array $criteria, array $orderBy = null)
 * @method Support[]    findAll()
 * @method Support[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupportRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Support::class);
    }

    /**
     * @param $number
     * @return Support[]
     */
    public function getNumberSupport($number) {
        return $queryBuilder = $this
                        ->createQueryBuilder('support')
                        ->orderBy('support.id', 'DESC')
                        ->setMaxResults($number)
                        ->getQuery()->getResult();
    }

//    /**
//     * @return Support[] Returns an array of Support objects
//     */
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
      public function findOneBySomeField($value): ?Support
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
