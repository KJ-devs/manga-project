<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\Entity\Category;
use App\entity\CategoryManga;
use App\Entity\Manga;
use App\Utils\verifInsertManga;

class modifierManga {
    public function __invoke() {
        session_start();
        $userRole = null;
        if (isset($_GET['deconnexion'])) {
            session_destroy();
            header('Location: /');
            exit();
        };
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $userRole = $user->getRole();
            if ($userRole != 'admin') {
                header('Location: /');
            }
        } else {
            header('Location: /');
        }
        $em = EntityManager::getInstance();
        $getAllCategories = $em->getRepository(Category::class)->getAllCategories();
        $id = $_GET['id'];
        $verifInsertManga = new verifInsertManga();
        $manga = $em->getRepository(Manga::class);
        $manga = $manga->findOneById($id);
        $categoryManga = $em->getRepository(CategoryManga::class);
        if (isset($_POST['modifier'])) {
            if (empty($verifInsertManga->verifAll())) {
                $id = $_POST['id'];
                $manga = $em->getRepository(Manga::class);
                $category = new Category();
                $manga->updateManga($id);  
                $category->setcategoryTitle($_POST['category']);
                $categoryManga = new CategoryManga($manga, $category);
                $em->persist($category);
                $em->persist($categoryManga);
                $em->flush();
                foreach ($_POST['categorie'] as $categorie) {
                    $manga = $em->getRepository(Manga::class)->findOneById($id);
                    $category = $em->getRepository(Category::class)->findOneByTitle($categorie);
                    $categoryManga = new CategoryManga($manga, $category);
                    $em->persist($categoryManga);
                    $em->flush();
                }
            }
           
        }


        return new Response('modifierManga.html.twig', ["manga" => $manga, 'categories' => $getAllCategories]);
    }
}
