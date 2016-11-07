<?php

namespace BookEditorBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BookRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BookRepository extends EntityRepository
{
    public function findTheLastThree(){

        $query = $this->createQueryBuilder('p')
            ->setMaxResults(3)
            ->orderBy('p.releaseDate', 'DESC')
            ->getQuery();

        return $query->getResult();
    }
    public function getTaggedBook(){

        $tagBook = $this->createQueryBuilder('b')
            ->orderBy('b.releaseDate', 'DESC')
            ->orderBy('b.tag', 'DESC')
            ->setMaxResults(9)
            ->getQuery();

        return $tagBook->getResult();
    }
    public function displayBook(){
        $orderBook = $this->createQueryBuilder('c')
            ->orderBy('c.releaseDate','DESC')
            ->getQuery();

        return $orderBook->getResult();
    }

}