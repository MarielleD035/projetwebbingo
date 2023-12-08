<?php

namespace App\Repository;

use App\Entity\ReadAccess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReadAccess>
 *
 * @method ReadAccess|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReadAccess|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReadAccess[]    findAll()
 * @method ReadAccess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReadAccessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReadAccess::class);
    }

//    /**
//     * @return ReadAccess[] Returns an array of ReadAccess objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReadAccess
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
