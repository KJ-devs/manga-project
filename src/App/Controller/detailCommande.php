<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\entity\Commande;

class detailCommande {
    public function __invoke() {
        session_start();
        $em = EntityManager::getInstance();
        $CommandeRepository = $em->getRepository(Commande::class);
     
      
        if (isset($_GET['deconnexion'])) {
            session_destroy();
            header('Location: /');
            exit();
        };
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $userRole = $user->getRole();
        }
        $idCommande = $_GET['id'];
        $getAllCommande = $CommandeRepository->getCommandeMangaByCommande($idCommande);

        return new Response('detailCommande.html.twig', ['commandes' => $getAllCommande, 'user' => $userRole]);
    }
}
