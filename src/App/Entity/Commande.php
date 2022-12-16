<?php

namespace App\Entity;


use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ORM\Table(name: 'Commande')]
class Commande {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', length: 255)]
    protected string $idUser;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $dateCommande;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $statutCommande;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $prixCommande;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $prixLivraison;

    // getters and setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): Commande {
        $this->id = $id;

        return $this;
    }

    public function getIdUser(): string {
        return $this->idUser;
    }

    public function setIdUser(string $idUser): Commande {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDateCommande(): string {
        return $this->dateCommande;
    }

    public function setDateCommande(string $dateCommande): Commande {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getStatutCommande(): string {
        return $this->statutCommande;
    }

    public function setStatutCommande(string $statutCommande): Commande {
        $this->statutCommande = $statutCommande;

        return $this;
    }

    public function getPrixCommande(): string {
        return $this->prixCommande;
    }

    public function setPrixCommande(string $prixCommande): Commande {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    public function getPrixLivraison(): string {
        return $this->prixLivraison;
    }

    public function setPrixLivraison(string $prixLivraison): Commande {
        $this->prixLivraison = $prixLivraison;

        return $this;
    }
    

}
