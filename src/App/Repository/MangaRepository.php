<?php

namespace App\Repository;

use App\Entity\Manga;
use Doctrine\ORM\EntityRepository;

class MangaRepository extends EntityRepository
{

    public function findOneByTitle(string $title): Manga {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm')
            ->where('m.title= :title')
            ->setParameter('title', $title);

        return $queryBuilder->getQuery()->getSingleResult();
    }

    
}
