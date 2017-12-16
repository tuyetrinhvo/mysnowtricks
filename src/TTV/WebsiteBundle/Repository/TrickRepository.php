<?php

namespace TTV\WebsiteBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * TrickRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TrickRepository extends \Doctrine\ORM\EntityRepository
{
    public function getTrick($id)
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->addSelect('i')
            ->leftJoin('t.user', 'u')
            ->addSelect('u')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery();


    }
    public function getAllTricks($page, $nbPerPage)
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.image', 'i')
            ->addSelect('i')
            ->leftJoin('t.user', 'u')
            ->addSelect('u')
            ->leftJoin('t.category', 'c')
            ->addSelect('c')
            ->orderBy('t.id', 'DESC')
            ->getQuery();

        $query->setFirstResult(($page -1 ) * $nbPerPage)->setMaxResults($nbPerPage);
        return new Paginator($query, true);
    }
}
