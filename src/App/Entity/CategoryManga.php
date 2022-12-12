<?php

namespace App\Entity;

use App\Repository\CategoryMangaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;

#[ORM\Entity(repositoryClass: CategoryMangaRepository::class)]
#[ORM\Table(name: 'categoriesOfEachManga')]
class CategoryManga {
   
  

    #[Id,ManyToOne (targetEntity: Manga::class)]
    private Manga|null $manga = null;
    
    #[Id,ManyToOne (targetEntity:Category::class)]
    private Category|null $category = null;
   


    public function __construct(Manga $idManga, Category $idCategory) {
        $this->manga = $idManga;
        $this->category = $idCategory;
    }





}