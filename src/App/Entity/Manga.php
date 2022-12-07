<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MangaRepository::class)]
#[ORM\Table(name: 'manga')]
class Manga {
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $title;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $description;

    #[ORM\Column(type: 'float',length: 255)]
    protected string $averageRating;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $posterImage;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $prix;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $stock;

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): Manga {
        $this->id = $id;

        return $this;
    }

    public function gettitle(): string {
        return $this->title;
    }

    public function settitle(string $title): Manga {
        $this->title = $title;

        return $this;
    }

    public function getdescription(): string {
        return $this->description;
    }

    public function setdescription(string $description): Manga {
        $this->description = $description;

        return $this;
    }

    public function getaverageRating(): string {
        return $this->averageRating;
    }

    public function setaverageRating(string $averageRating): Manga {
        $this->averageRating = $averageRating;

        return $this;
    }

    public function getposterImage(): string {
        return $this->posterImage;
    }

    public function setposterImage(string $posterImage): Manga {
        $this->posterImage = $posterImage;

        return $this;
    }

    public function getprix(): string {
        return $this->prix;
    }

    public function setprix(string $prix): Manga {
        $this->prix = $prix;

        return $this;
    }

    public function getstock(): string {
        return $this->stock;
    }

    public function setstock(string $stock): Manga {
        $this->stock = $stock;

        return $this;
    }

   
}