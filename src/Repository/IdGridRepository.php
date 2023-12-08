<?php

namespace App\Repository;

use App\Entity\IdGrid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdGrid>
 *
 * @method IdGrid|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdGrid|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdGrid[]    findAll()
 * @method IdGrid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdGridRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdGrid::class);
    }

//    /**
//     * @return IdGrid[] Returns an array of IdGrid objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IdGrid
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
