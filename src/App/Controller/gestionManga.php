<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\entity\CategoryManga;
use App\Entity\Manga;

class gestionManga {
    public function __invoke() {
        session_start();    
        $em = EntityManager::getInstance();
        $getAllmanga = $em->getRepository(Manga::class);
        $getAllmanga = $getAllmanga->getAllManga();
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
        if (isset($_POST['supprimerManga'])) {
            $id = $_POST['manga'];
            $manga = $em->getRepository(Manga::class);
            $categoryManga = $em->getRepository(CategoryManga::class);
            $categoryManga->deleteCategoryManga($id);
            $manga->deleteManga($id);
            header("Refresh:0");
        }
        return new Response('gestionManga.html.twig', ['mangas' => $getAllmanga, 'user' => $userRole]);
    }
}
