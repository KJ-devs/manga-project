<?php
namespace App\script;
use App\Entity\Manga;
// use App\Repository\MangaRepository;
// use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;



class insertManga {
   
    function insertMangaToDataBase() {
           
        $em = EntityManager::getInstance();
        
        $i = 0;
        for ($i; $i < 100; $i += 20) {
            $mangaManager = new Manga();
            $url = 'https://kitsu.io/api/edge/manga?page[limit]=20&page[offset]=' . $i;
            $json = file_get_contents($url);
            $obj = json_decode($json);
            $mangas = $obj->data; 
            foreach ($mangas as $manga) {
                
               $mangaManager->setTitle($manga->attributes->canonicalTitle);
               $mangaManager->setdescription($manga->attributes->description);
               $mangaManager->setaverageRating($manga->attributes->averageRating || null);
               $mangaManager->setposterImage($manga->attributes->posterImage->tiny);
               $mangaManager->setprix(rand(1,20));
               $mangaManager->setstock(rand(0,150));
               $em->persist($mangaManager);
            $em->flush();
            }
            
        }

    }
}
   
