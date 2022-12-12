<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findOneByEmail(string $email): User|null
    {
        $email = $_POST['email'];
        // query builder WAY
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('u')
            ->from(User::class, 'u')
            ->where('u.email = :email')
            ->setParameter('email', $email);
        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
    
}
