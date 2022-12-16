<?php

namespace App\Utils;

use Framework\Doctrine\EntityManager;
use App\Entity\User;
use App\Repository\UserRepository;

class verifLogin {
    private array $errors = [];

    public function getErrors(): array {
        return $this->errors;
    }
    public function verifLogin(): array {
        $em = EntityManager::getInstance();
        $user = $em->getRepository(User::class)->findOneByEmail($_POST['email']);
        if (empty($user)) {
            $this->errors[] = 'Email incorrect';
        } else {
            if (!password_verify(htmlspecialchars($_POST['password']), $user->getPassword())) {
                $this->errors[] = 'Mot de passe incorrect';
            }
        }
        return $this->errors;
    }
}
