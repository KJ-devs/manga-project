<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\Entity\Category;
use App\entity\CategoryManga;
use App\Entity\Manga;

class modifierManga {
    public function __invoke() {
        $em = EntityManager::getInstance();
        $getAllCategories = $em->getRepository(Category::class)->getAllCategories();
        $id = $_POST['manga'];
        $manga = $em->getRepository(Manga::class);
        $manga = $manga->findOneById($id);  
        $categoryManga = $em->getRepository(CategoryManga::class);
     
  
          if (isset($_POST['modifier'])) {
             $id = $_POST['id'];
            $categoryManga->deleteCategoryManga($id);
               $manga = $em->getRepository(Manga::class);
               $manga->updateManga($id);
             foreach ($_POST['categorie'] as $categorie) {
                $manga = $em->getRepository(Manga::class)->findOneById($id);
               $category = $em->getRepository(Category::class)->findOneByTitle($categorie);
                $categoryManga = new CategoryManga($manga, $category);
                $em->persist($categoryManga);
                $em->flush();
         }
            
         
    }


        return new Response('modifierManga.html.twig', ["manga" => $manga , 'categories' => $getAllCategories]);
    }
}
