<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;
use Framework\Response\Response;
use App\Utils\verifLogin;
class Login
{
  public function __invoke()
  {
      $errors = [];
     
      $verifLogin = new verifLogin();
      if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
          if(!empty($verifLogin->verifLogin()) ) {
              $errors = $verifLogin->getErrors();
          } else {
              session_start();
              $em = EntityManager::getInstance();
              $user = $em->getRepository(User::class)->findOneByEmail($_POST['email']);
              $_SESSION['user'] = $user;
              header('Location: /');
          }
        }
       return new Response('login.html.twig', ['errors' => $errors]);
   
  }
}
