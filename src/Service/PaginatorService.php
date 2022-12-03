<?php
namespace App\Service;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PaginatorService
{
    public function paginate($dql, $page = 1, $limit = 5)
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1)) // Offset
            ->setMaxResults($limit); // Limit

        return $paginator;
    }
}