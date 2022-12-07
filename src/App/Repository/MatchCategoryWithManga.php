<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository {

    // find single category by libellé
    public function findOneByTitle(string $title): Category {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('c')
            ->from(Category::class, 'c')
            ->where('c.categoryTitle = :categoryTitle')
            ->setParameter('categoryTitle', $title);

        return $queryBuilder->getQuery()->getSingleResult();
    }
}
