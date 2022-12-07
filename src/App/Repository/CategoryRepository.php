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


    // public function findOneByEmail(string $email): Manga
    // {
    //     $first_name = $_POST['first_name'];
    //     $last_name = $_POST['last_name'];
    //     $email = $_POST['email'];
    //     $address = $_POST['address'];
    //     $phone_number = $_POST['phone_number'];
    //     $password = $_POST['password'];


    //     // DQL way
    //     /*$dql = 'SELECT u FROM ' . User::class . ' u WHERE u.email=:email';
    //     $query= $this->_em->createQuery($dql);
    //     $query->setParameter('email', $email);

    //     return $query->getSingleResult();*/

    //     // query builder WAY
    //     $queryBuilder = $this->_em->createQueryBuilder();
    //     $queryBuilder
    //         ->select('u')
    //         ->from(User::class, 'u')
    //         ->where('u.email = :email')
    //         ->setParameter('email', $email);

    //     return $queryBuilder->getQuery()->getSingleResult();
    // }
}
