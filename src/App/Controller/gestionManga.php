<?php
namespace App\Controller;
use Framework\Response\Response;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;

use App\Entity\Manga;
use App\script\insertManga;
use App\Repository\CategoryRepository;
use App\Entity\Category;
class gestionManga {
    public function __invoke() {

        $em = EntityManager::getInstance();
        $getAllmanga = $em->getRepository(Manga::class);
        $getAllmanga = $getAllmanga->getAllManga();
        return new Response('gestionManga.html.twig', ['mangas' => $getAllmanga]);
    }
}