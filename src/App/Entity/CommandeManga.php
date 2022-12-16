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
}
