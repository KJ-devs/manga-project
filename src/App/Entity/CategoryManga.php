<?php

namespace App\Entity;

use App\Repository\MatchCategoryWithMangaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchCategoryWithMangaRepository::class)]
#[ORM\Table(name: 'categoriesOfEachManga')]
class CategoryManga {
   
  

    #[ORM\Column (type: 'string', length: 255)]
    protected string $idManga;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $idCategory;
   

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): CategoryManga {
        $this->id = $id;

        return $this;
    }

    public function getMangaId(): string {
        return $this->idManga;
    }

    public function setMangaId(string $idManga): CategoryManga {
        $this->idManga = $idManga;

        return $this;
    }

    public function getCategoryId(): string {
        return $this->idCategory;
    }

    public function setCategoryId(string $idCategory): CategoryManga {
        $this->idCategory = $idCategory;

        return $this;
    }


}