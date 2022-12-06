<?php

namespace App\Repository;

use App\Entity\Manga;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
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
