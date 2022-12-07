<?php

namespace App\Entity;

use App\Repository\MatchCategoryWithMangaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;

#[ORM\Entity(repositoryClass: MatchCategoryWithMangaRepository::class)]
#[ORM\Table(name: 'categoriesOfEachManga')]
class CategoryManga {
   
  

    #[Id,ManyToOne (targetEntity: Manga::class)]
    private Manga|null $idManga = null;
    
    #[Id,ManyToOne (targetEntity:Category::class)]
    private Category|null $idCategory = null;
   


    public function __construct(Manga $idManga, Category $idCategory) {
        $this->idManga = $idManga;
        $this->idCategory = $idCategory;
    }





}