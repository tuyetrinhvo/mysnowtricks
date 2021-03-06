<?php

namespace TTV\WebsiteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{
    public function getCommentsByTrick($trick, $page, $nbPerPage)
    {
        $query = $this  ->createQueryBuilder('c')
                        ->where('c.trick = :trick')
                        ->setParameter('trick', $trick)
                        ->leftJoin('c.user', 'u')
                        ->addSelect('u')
                        ->orderBy('c.date', 'DESC')
                        ->getQuery();

        $query  ->setFirstResult(($page-1) * $nbPerPage)
                ->setMaxResults($nbPerPage)
        ;

        return new Paginator($query, true);
    }

}
