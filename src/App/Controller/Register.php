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
    // verification for each field of the form
    $verification = new verifRegister;
    $errors = [];

   
    if (isset($_POST['inscription'])) {
      if (empty($verification->verifEmail($errors)) && empty($verification->verifPassword($errors))) {
        $em = EntityManager::getInstance();
        $user = new User();
        $user->setFirstName(htmlspecialchars($_POST['first_name']));
        $user->setLastName(htmlspecialchars($_POST['last_name']));
        $user->setEmail(htmlspecialchars($_POST['email']));
        $user->setAddress('');
        $user->setCity('');
        $user->setZipCode('');
        $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $em->persist($user);
        $em->flush();
        header('Location: /login');
      }
     
    }
    return new Response('register.html.twig', ['errors' => $errors]);
  }
}
