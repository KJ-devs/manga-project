<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;
use Framework\Response\Response;
use App\script\insertManga;

class Homepage
{
  public function __invoke()
  {
       $mangaManager = new insertManga();
      // $mangaManager->insertMangaToDataBase();
      // $mangaManager->insertMangaCategories();
      $mangaManager->insertCategoryOfEachManga();
    
      //  $inserData->insertMangaToDataBase();
      //    $em = EntityManager::getInstance();

      //     $user = new User();
      //     $user
      //         ->setFirstName('Boris')
      //        ->setLastName('CERATI')
      //         ->setEmail('cerati.boris@gmail.com');

      //     $em->persist($user);
      //     $em->flush();

      //    /** @var UserRepository$userRepository */
      //  $userRepository = $em->getRepository(User::class);
      //   $users = $userRepository->findAll();
      //  $user = $userRepository->findOneByEmail('cerati.boris@gmail.com');

      return new Response('home.html.twig');
  }
}
