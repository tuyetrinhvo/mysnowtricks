<?php

namespace TTV\WebsiteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * TrickRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TrickRepository extends EntityRepository
{
    public function getTrick($id)
    {
        $query = $this->createQueryBuilder('t')
                    ->leftJoin('t.user', 'u')
                    ->addSelect('u')
                    ->leftJoin('t.category', 'ca')
                    ->addSelect('ca')
                    ->leftJoin('t.images', 'i')
                    ->addSelect('i')
                    ->leftJoin('t.videos', 'v')
                    ->addSelect('v')
                    ->andWhere('t.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery();
        return $query->getOneOrNullResult();


    }
    public function getAllTricks($page, $nbPerPage)
    {
        $query = $this  ->createQueryBuilder('t')
                        ->leftJoin('t.images', 'i')
                        ->addSelect('i')
                        ->leftJoin('t.user', 'u')
                        ->addSelect('u')
                        ->leftJoin('t.category', 'ca')
                        ->addSelect('ca')
                        ->orderBy('t.date', 'DESC')
                        ->addOrderBy('t.updatedAt', 'DESC')
                        ->getQuery();

        $query  ->setFirstResult(($page-1) * $nbPerPage)
                ->setMaxResults($nbPerPage);

        return new Paginator($query, true);
    }

    public function getPreviousTrick($currentId)
    {
        $query = $this  ->createQueryBuilder('t')
                        ->where('t.id < :currentId')
                        ->setParameter(':currentId', $currentId)
                        ->orderBy('t.id', 'DESC')
                        ->setFirstResult(0)
                        ->setMaxResults(1)
                        ->getQuery();

        $query->getOneOrNullResult();
    }

    public function getNextTrick($currentId)
    {
        $query = $this  ->createQueryBuilder('t')
                        ->where('t.id > :$currentId')
                        ->setParameter(':currentId', $currentId)
                        ->orderBy('t.id', 'ASC')
                        ->setFirstResult(0)
                        ->setMaxResults(1)
                        ->getQuery();

        $query->getOneOrNullResult();
    }
}
