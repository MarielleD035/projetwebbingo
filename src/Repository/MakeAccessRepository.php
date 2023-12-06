<?php

namespace App\Repository;

use App\Entity\MakeAccess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MakeAccess>
 *
 * @method MakeAccess|null find($id, $lockMode = null, $lockVersion = null)
 * @method MakeAccess|null findOneBy(array $criteria, array $orderBy = null)
 * @method MakeAccess[]    findAll()
 * @method MakeAccess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MakeAccessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MakeAccess::class);
    }

//    /**
//     * @return MakeAccess[] Returns an array of MakeAccess objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MakeAccess
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
