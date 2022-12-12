<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use App\Entity\CategoryManga;
use Framework\Doctrine\EntityManager;
use Framework\Response\Response;
use App\Entity\Manga;
use App\script\insertManga;
use App\Repository\CategoryRepository;
use App\Entity\Category;

class Homepage
{
  public function __invoke()
  {
     // $category = new insertManga();
    // $category->insertCategoryOfEachManga();
    session_start();
    $em = EntityManager::getInstance();
    $getAllmanga = $em->getRepository(Manga::class);
    $getAllmanga = $getAllmanga->getAllManga();
   

    
      

    

      return new Response('home.html.twig' , ['mangas' => $getAllmanga]);
  }
}
