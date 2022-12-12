<?php

namespace App\Repository;

use App\Entity\CategoryManga;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryMangaRepository extends EntityRepository {

    public function updateCategoryManga(Category $category, $idManga) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
                ->update(CategoryManga::class, 'cm')
                ->set('cm.idCategory_id', ':idCategory_id')
                ->where('cm.idManga_id = :idManga_id')
                ->setParameter('idCategory_id', $category)
                ->setParameter('idManga_id', $idManga);
        $queryBuilder->getQuery()->execute();
    }
   
    public function deleteCategoryManga($idManga) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
                ->delete(CategoryManga::class, 'cm')
                ->where('cm.manga = :idManga_id')
                ->setParameter('idManga_id', $idManga);
        $queryBuilder->getQuery()->execute();
    }
   
   
}
