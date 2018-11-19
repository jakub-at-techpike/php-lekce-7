<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }
    
    public function findByYearRange($from = null, $to = null)
    {
        $queryBuilder = $this->createQueryBuilder('b');
        
        if (!is_null($from)) {
            $queryBuilder
                ->andWhere('b.releaseYear >= :from')
                ->setParameter('from', $from)
            ;
        }

        if (!is_null($to)) {
            $queryBuilder
                ->andWhere('b.releaseYear <= :to')
                ->setParameter('to', $to)
            ;
        }
        
        return $queryBuilder->getQuery()->getResult();
    }
    
    public function findNew()
    {
        $from = date("Y", strtotime("-2 years"));
        
        return $this->createQueryBuilder('b')
            ->andWhere('b.releaseYear >= :from')
            ->setParameter('from', $from)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Book[] Returns an array of Book objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
