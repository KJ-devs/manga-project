<?php

namespace App\Repository;

use App\Entity\Manga;
use Doctrine\ORM\EntityRepository;

class MangaRepository extends EntityRepository
{

    public function findOneByTitle(string $title): Manga|null {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm')
            ->where('m.title= :title')
            ->setParameter('title', $title);

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
    public function getMangaById($id) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm')
            ->where('m.id = :id')
            ->setParameter('id', $id);

        return $queryBuilder->getQuery()->getResult();
    }	
    public function getAllManga() {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm');

        return $queryBuilder->getQuery()->getResult();
    }
    public function getMangaByCategory($category) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm')
            ->where('m.category = :category')
            ->setParameter('category', $category);

        return $queryBuilder->getQuery()->getResult();
    }

    public function getMangaByTitle($title) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('m')
            ->from(Manga::class, 'm')
            ->where('m.title = :title')
            ->setParameter('title', $title);

        return $queryBuilder->getQuery()->getResult();
    }

    public function updateManga($id) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->update(Manga::class, 'm')
            ->set('m.title', ':title')
            ->set('m.description', ':description')
            ->set('m.posterImage', ':posterImage')
            ->set('m.prix', ':prix')
            ->set('m.stock', ':stock')
            ->where('m.id = :id')
            ->setParameter('title', $_POST['title'])
            ->setParameter('description', $_POST['description'])
            ->setParameter('posterImage', $_POST['posterImage'])
            ->setParameter('prix', $_POST['price'])
            ->setParameter('stock', $_POST['stock'])
            ->setParameter('id', $id);

        return $queryBuilder->getQuery()->getResult();
    }

    
}
