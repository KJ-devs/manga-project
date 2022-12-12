<?php

namespace App\Utils;

use Framework\Doctrine\EntityManager;
use App\Entity\Category;
use App\Entity\Manga;
use App\Utils\CategoryRepository;

class verifInsertManga {
    private array $errors = [];

    public function getErrors(): array {
        return $this->errors;
    }

    // verification of title if exist

    public function verifTitle(): array {
        $em = EntityManager::getInstance();
        $manga = $em->getRepository(Manga::class)->findOneByTitle($_POST['title']);
        if (empty($_POST['title'])) {
            $this->errors['title'] = 'Veuillez renseigner un titre';
        }
        if (!empty($manga)) {
            $this->errors['title'] = 'Ce titre existe déjà';
        }
        return $this->errors;
    }

    // verification of description if exist

    public function verifDescription(): array {
        if (empty($_POST['description'])) {
            $this->errors['description'] = 'Veuillez renseigner une description';
        }
        return $this->errors;
    }



    // verification of posterImage if exist

    public function verifPosterImage(): array {
        if (empty($_POST['poster_image'])) {
            $this->errors['poster_image'] = 'Veuillez renseigner une image';
        }
        if (!filter_var($_POST['poster_image'], FILTER_VALIDATE_URL)) {
            $this->errors['poster_image'] = "Veuillez renseigner un lien d'une image";
        }
        return $this->errors;
    }

    // verification of category if exist and if exist in database

    public function verifCategory(): array {
        $em = EntityManager::getInstance();
        $category = $em->getRepository(Category::class)->findOneByTitle($_POST['category']);
        if (empty($_POST['category'])) {
            $this->errors['category'] = 'Veuillez renseigner une catégorie';
        }
        if ($category) {
            $this->errors['category'] = 'Cette catégorie existe déjà';
        }
        return $this->errors;
    }


   

    public function verifPrix(): array {
        if (empty($_POST['price'])) {
            $this->errors['price'] = 'Veuillez renseigner un prix';
        }
        if (!is_numeric($_POST['price'])) {
            $this->errors['price'] = 'Veuillez renseigner un prix en chiffre';
        }
        return $this->errors;
    }

    // verification of stock if exist

    public function verifStock(): array {
        if (empty($_POST['stock'])) {
            $this->errors['stock'] = 'Veuillez renseigner un stock';
        }
        if (!is_numeric($_POST['stock'])) {
            $this->errors['stock'] = 'Veuillez renseigner un prix en chiffre';
        }
        return $this->errors;
    }

    public function verifAll(): array {
        $this->verifTitle();
        $this->verifDescription();
        $this->verifPosterImage();
        $this->verifCategory();
        $this->verifPrix();
        $this->verifStock();
        return $this->errors;
    }
}
