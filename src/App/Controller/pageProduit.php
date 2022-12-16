<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\entity\CategoryManga;
use App\Entity\Manga;


class pageProduit {
    public function __invoke() {
        session_start();
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $userRole = null;
        if (isset($_SESSION['user'])) {
            $userRole = $_SESSION['user']->getRole();
        }
        if (isset($_GET['deconnexion'])) {
            session_destroy();
            header('Location: /');
            exit();
        };
        if (!isset($_COOKIE['panier'])) {
            setcookie('panier', serialize($_SESSION['panier']), time() + 1800,);
        }
        $em = EntityManager::getInstance();
        $manga = $em->getRepository(Manga::class);
        $idManga = $_GET;
        $manga = $manga->findOneById($idManga);
        if (isset($_POST['ajouterPanier'])) {
            $id = $_POST['id'];
            $manga = $em->getRepository(Manga::class);
            $manga = $manga->findOneById($id);
            $_SESSION['panier'][$id] = 1;
        }
        return new Response('pageProduit.html.twig', ['manga' => $manga,'user' => $userRole]);
    }
}
