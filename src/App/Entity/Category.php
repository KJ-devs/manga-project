<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'categories')]
class Category {
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $categoryTitle;

   

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): Category {
        $this->id = $id;

        return $this;
    }

    public function getcategoryTitle(): string {
        return $this->categoryTitle;
    }

    public function setcategoryTitle(string $categoryTitle): Category {
        $this->categoryTitle = $categoryTitle;

        return $this;
    }

   

}