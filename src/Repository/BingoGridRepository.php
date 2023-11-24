<?php

namespace App\Repository;

use App\Entity\BingoGrid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BingoGrid>
 *
 * @method BingoGrid|null find($id, $lockMode = null, $lockVersion = null)
 * @method BingoGrid|null findOneBy(array $criteria, array $orderBy = null)
 * @method BingoGrid[]    findAll()
 * @method BingoGrid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BingoGridRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BingoGrid::class);
    }

//    /**
//     * @return BingoGrid[] Returns an array of BingoGrid objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BingoGrid
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
