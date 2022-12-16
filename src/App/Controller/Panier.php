<?php

namespace App\Controller;

use Framework\Response\Response;
use Framework\Doctrine\EntityManager;
use App\Entity\Commande;
use App\Entity\Manga;
use App\Entity\CommandeManga;

class Panier {
    public function __invoke() {
        session_start();
        $AllManga = [];
        $total = 0;
        $em = EntityManager::getInstance();
        $manga = $em->getRepository(Manga::class);
        $userRole = null;
        if (isset($_SESSION['user'])) {
            $userRole = $_SESSION['user']->getRole();
        }
        if (isset($_GET['deconnexion'])) {
            session_destroy();
            header('Location: /');
            exit();
        };
        $id = array_keys($_SESSION['panier']);
        foreach ($id as $idManga) {
            $manga = $em->getRepository(Manga::class);
            $manga = $manga->findOneById($idManga);
            $AllManga[] = $manga;
        }
        if (isset($_POST['supprimerManga'])) {
            $id = $_POST['id'];
            foreach (array_keys($_SESSION['panier']) as $value) {
                if ($value == $id) {
                    unset($_SESSION['panier'][$value]);
                }
            }
            foreach ($AllManga as $key => $manga) {
                if ($manga->getId() == $id) {
                    unset($AllManga[$key]);
                }
            }
        }
       
        if (isset($_POST['valideCommande'])) {
            $mangaId = $_POST['mangaId'];
            $quantite = $_POST['quantite'];
            $mangas = [];
            $prixTotalCommande = 0;
            $shippingPrice = 2;
            $prix = $_POST['mangaPrix'];
            // recupère une array avec manga => [id => [prix => 1, quantite => 1]
            foreach ($mangaId as $idManga) {
                for ($i = 0; $i < count($mangaId); $i++) {
                    $mangas[$mangaId[$i]] = array(
                        "prix" => $prix[$i],
                        "quantite" => $quantite[$i]
                    );
                }
            }
            ;
            // calcul du prix de la livraison
            for ($i = 0; $i < count($mangaId) - 1; $i++) {
                if ($mangaId > 1) {
                    $shippingPrice += 1;
                }
            }
           
            foreach ($mangas as $mangaId => $details) {
                $prixTotal = $details["prix"] * $details["quantite"];
                $prixTotalCommande += $prixTotal;
            }
            $prixTotalCommande += $shippingPrice;
            echo $prixTotalCommande;
            // $date = date('d-m-Y');
            // echo $date;
            $em = EntityManager::getInstance();
            $commandeRepository = $em->getRepository(Commande::class);
            $commande = $commandeRepository->insertCommande($_SESSION['user']->getId(), $prixTotalCommande, $shippingPrice);
            $mangaRepository = $em->getRepository(Manga::class);
            foreach($mangas as $mangaId => $details){
                $manga = $mangaRepository->findOneById($mangaId);
                    $commandeManga = new CommandeManga($commande, $manga, (int)$details['quantite'], (int)$details['prix']);
                    $em->persist($commandeManga);
                    $em->flush();
            }
            
            
            echo '<script>alert("Votre commande a bien été prise en compte")</script>';
        }

        return new Response('panier.html.twig', ['mangas' => $AllManga, 'user' => $userRole, 'js' => ['panier.js', 'paypal.js']]);
    }
}
