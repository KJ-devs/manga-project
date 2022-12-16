<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;
use Framework\Response\Response;
use App\Utils\verifRegister;



class Register {
  public function __invoke() {
    session_start();
    $userRole = null;
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      $userRole = $user->getRole();
    } 
    $verification = new verifRegister;

    if (isset($_POST['inscription'])) {
      if (empty($verification->verifRegister())) {
        $em = EntityManager::getInstance();
        $user = new User();
        $user->setFirstName(htmlspecialchars($_POST['first_name']));
        $user->setLastName(htmlspecialchars($_POST['last_name']));
        $user->setEmail(htmlspecialchars($_POST['email']));
        $user->setAddress(htmlspecialchars($_POST['address']));
        $user->setCity(htmlspecialchars($_POST['city']));
        $user->setZipCode(htmlspecialchars($_POST['zipCode']));
        if ($_SESSION != null) {
          if ($_SESSION['user']->getRole() == 'admin') {
            $user->setRole($_POST['role']);
          } else {
            $user->setRole('user');
          }
        }
        $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $em->persist($user);
        $em->flush();
        header('Location: /login');
      }
    }
    return new Response('register.html.twig', ['errors' => $verification->getErrors(), 'user' => $userRole]);
  }
}
