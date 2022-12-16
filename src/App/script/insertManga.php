<?php

namespace App\script;

use App\Entity\Manga;
use App\Entity\Category;
use App\Entity\CategoryManga;


use Framework\Doctrine\EntityManager;



class insertManga {

    function insertMangaToDataBase() {
        $em = EntityManager::getInstance();
        $i = 0;
        for ($i; $i < 100; $i += 20) {

            $urlmanga = 'https://kitsu.io/api/edge/manga?page[limit]=20&page[offset]=' . $i;
            $json = file_get_contents($urlmanga);
            $obj = json_decode($json);
            $mangas = $obj->data;
            foreach ($mangas as $manga) {
                $mangaManager = new Manga();
                $mangaManager->setTitle($manga->attributes->canonicalTitle);
                $mangaManager->setdescription($manga->attributes->description);
                $mangaManager->setaverageRating($manga->attributes->averageRating || null);
                $mangaManager->setposterImage($manga->attributes->posterImage->original);
                $mangaManager->setprix(rand(1, 20));
                $mangaManager->setstock(rand(0, 150));
                $em->persist($mangaManager);
                $em->flush();
            }
        }
    }

    // insertion des categories dans la table category de chaque manga que j'ai récupéré
    // code pas clean répétition de code à revoir
    function insertMangaCategories() {
        $em = EntityManager::getInstance();
        $i = 0;
        for ($i; $i < 100; $i += 20) {
            $urlmanga = 'https://kitsu.io/api/edge/manga?page[limit]=20&page[offset]=' . $i;
            $json = file_get_contents($urlmanga);
            $obj = json_decode($json);
            $mangas = $obj->data;
            // récupère tout les mangas
            foreach ($mangas as $manga) {
                $urlcategories = $manga->relationships->categories->links->related;
                $json = file_get_contents($urlcategories);
                $obj = json_decode($json);
                $categories = $obj->data;
                // récupère toutes les catégories d'un manga
                foreach ($categories as $category) {
                    $categoryList[] = $category->attributes->title;
                    // supprime tout les doublons de catégories
                    $listOfUniqueCategory = array_unique($categoryList);
                }
            }
        }
        // insertion des catégories sans les doublons
        foreach ($listOfUniqueCategory as $value) {
            $categoryManager = new Category();
            $categoryManager->setcategoryTitle($value);
            $em->persist($categoryManager);
            $em->flush();
            
        }
    }

  
    function insertCategoryOfEachManga() {
        $em = EntityManager::getInstance();
        $i = 0;
 
        for ($i; $i < 100; $i += 20) {
            $urlmanga = 'https://kitsu.io/api/edge/manga?page[limit]=20&page[offset]=' . $i;
            $json = file_get_contents($urlmanga);
            $obj = json_decode($json);
            $mangas = $obj->data;
            // récupère tout les mangas
            foreach ($mangas as $manga) {
                $urlcategories = $manga->relationships->categories->links->related;
                $json = file_get_contents($urlcategories);
                $obj = json_decode($json);
                $categories = $obj->data;
                
                foreach ($categories as $category) {
                   $mangax = $em->getRepository(Manga::class)->findOneByTitle($manga->attributes->canonicalTitle);
                   $categoryx = $em->getRepository(Category::class)->findOneByTitle($category->attributes->title);
                    $categoryManga = new CategoryManga($mangax, $categoryx);
                    $em->persist($categoryManga);
                    $em->flush();
                }
            }
        }
        
    }

}

