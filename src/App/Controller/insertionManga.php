<?php

namespace App\Controller;

use Framework\Doctrine\EntityManager;
use Framework\Response\Response;
use App\Entity\Category;
use App\Entity\Manga;
use App\Entity\CategoryManga;
use App\Utils\verifInsertManga;

class insertionManga {
    public function __invoke() {
        session_start();
        $em = EntityManager::getInstance();
        $getAllCategories = $em->getRepository(Category::class)->getAllCategories();
        
        $categoriesManager = $em->getRepository(Category::class);
        $verifInsertManga = new verifInsertManga();
        $manga = $em->getRepository(Manga::class);
        if (isset($_POST['insertManga'])) {
            if (empty($verifInsertManga->verifAll())) {
                $manga = new Manga();
                $category = new Category();
                $manga->setTitle($_POST['title']);
                $manga->setDescription($_POST['description']);
                $manga->setposterImage($_POST['poster_image']);
                $manga->setaverageRating('');
                $manga->setStock($_POST['stock']);
                $manga->setprix($_POST['price']);
                $em->persist($manga);
                $em->flush();
                
                $category->setcategoryTitle($_POST['category']);
                $categoryManga = new CategoryManga($manga, $category);
                $em->persist($category);
                $em->persist($categoryManga);
                $em->flush();

                foreach ($_POST['categorie'] as $categorie) {
                    $mangax = $em->getRepository(Manga::class)->findOneByTitle($_POST['title']);
                    $categoryx = $em->getRepository(Category::class)->findOneByTitle($categorie);
                    $categoryMangax = new CategoryManga($mangax, $categoryx);
                    $em->persist($categoryMangax);
                    $em->flush();
                }
            }
        }
        return new Response('insertionManga.html.twig', ['categories' => $getAllCategories]);
    }
}
