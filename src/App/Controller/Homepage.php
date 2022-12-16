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

class Homepage {
  public function __invoke() {
    session_start();
    $userRole = null;
    if(isset($_SESSION['user'])) {
      $userRole = $_SESSION['user']->getRole();
    }
    if (isset($_GET['deconnexion'])) {
      session_destroy();
      header('Location: /');
      exit();
    };
    if (!isset($_SESSION['panier'])) {
      $_SESSION['panier'] = [];
    }
    if (!isset($_COOKIE['panier'])) {
      setcookie('panier', serialize($_SESSION['panier']), time() + 1800,);
    }
    if (isset($_POST['ajouterPanier'])) {
      $id = $_POST['id'];
      $_SESSION['panier'][$id] = 1;
      $_COOKIE['panier'] = serialize($_SESSION['panier']);
    }
    $em = EntityManager::getInstance();
    $getAllCategories = $em->getRepository(Category::class)->getAllCategories();
    $prix = 'prix';
    $em = EntityManager::getInstance();
    $manga = $em->getRepository(Manga::class);
    $getAllmanga = $manga->getAllManga();
    if (isset($_POST['getManga'])) {
      if (!empty($_POST['categorie']) && !empty($_POST['prix'])) {
        $category = $_POST['categorie'];
        $prix = (int)$_POST['prix'];
        $getAllmanga = $manga->getMangaByCategoryNameAndPrice($category, $prix);
      } else if (!empty($_POST['categorie'])) {
        $category = $_POST['categorie'];
        $getAllmanga = $manga->getMangaByCategoryName($category);
      } else if (!empty($_POST['prix'])) {
        $prix = (int)$_POST['prix'];
        $getAllmanga = $manga->getMangaByLowPrice($prix);
      }
    }

    return new Response('home.html.twig', ['mangas' => $getAllmanga, 'categories' => $getAllCategories, 'prix' => $prix, 'user' => $userRole]);
  }
}
