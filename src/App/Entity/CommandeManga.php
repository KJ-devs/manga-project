<?php

namespace App\Entity;


use App\Repository\CommandeMangaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;

#[ORM\Entity(repositoryClass: CommandeMangaRepository::class)]
#[ORM\Table(name: 'CommandeManga')]
class CommandeManga {



    #[Id, ManyToOne(targetEntity: Commande::class)]
    private Commande|null $commande = null;

    #[Id, ManyToOne(targetEntity: Manga::class)]
    private Manga|null $manga = null;

    #[ORM\Column(type: 'integer')]
    private int $quantite;

    #[ORM\Column(type: 'integer')]
    private int $prix;


    public function __construct(Commande $idCommande, Manga $idManga, int $quantite,int $prix) {
        $this->commande = $idCommande;
        $this->manga = $idManga;
        $this->quantite = $quantite;
        $this->prix = $prix;
        

    }

    public function getCommande(): Commande|null {
        return $this->commande;
    }

    public function setCommande(Commande $commande): self {
        $this->commande = $commande;

        return $this;
    }

    public function getManga(): Manga|null {
        return $this->manga;
    }

    public function setManga(Manga $manga): self {
        $this->manga = $manga;

        return $this;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): int {
        return $this->prix;
    }

    public function setPrix(int $prix): self {
        $this->prix = $prix;

        return $this;
    }
    
}
