<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\entity\Commande;

class gestionCommande {
    public function __invoke() {
        session_start();
        $em = EntityManager::getInstance();
        $CommandeRepository = $em->getRepository(Commande::class);
        $getAllCommande = $CommandeRepository->getAllCommande();
      
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
        if (isset($_POST['modifierCommande'])) {
            $idCommande = $_POST['idCommande'];
            
            $statuteCommande = $_POST['statutCommande'];
            $CommandeRepository->updateCommande($idCommande, $statuteCommande);
            header('Location: /gestionCommande');
        }
        return new Response('gestionCommande.html.twig', ['commandes' => $getAllCommande, 'user' => $userRole]);
    }
}
