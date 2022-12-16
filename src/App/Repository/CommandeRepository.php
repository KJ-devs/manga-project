<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Entity\CommandeManga;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;


class CommandeRepository extends EntityRepository {

    public function insertCommande($id, $prixTotalCommande, $shippingPrice) {
        $em = EntityManager::getInstance();
        $commande = new Commande();
        $commande->setIdUser($id);
        $commande->setStatutCommande('en cours');
        $commande->setDateCommande(date('d-m-Y'));
        $commande->setPrixCommande($prixTotalCommande);
        $commande->setPrixLivraison($shippingPrice);
        $em->persist($commande);
        $em->flush();
        return $commande;
    }
    public function getAllCommande() {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('c')
            ->from(Commande::class, 'c');

        return $queryBuilder->getQuery()->getResult();
    }

    public function getAllCommandeByUserId($idUser) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('c')
            ->from(Commande::class, 'c')
            ->where('c.idUser = :id')
            ->setParameter('id', $idUser);

        return $queryBuilder->getQuery()->getResult();
    }
    // public function getCommandeByCommande($idcommande) {
    //     $queryBuilder = $this->_em->createQueryBuilder();
    //     $queryBuilder
    //         ->select('c, cm')
    //         ->from(Commande::class, 'c')
    //         ->join(CommandeManga::class, 'cm')
    //         ->where('c.id = cm.commande')
    //         ->setParameter('id', $idcommande);

    //     return $queryBuilder->getQuery()->getResult();
    // }

    public function getCommandeMangaByCommande($idcommande) {
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder
            ->select('cm')
            ->from(CommandeManga::class, 'cm')
            ->where('cm.commande = :id')
            ->setParameter('id', $idcommande);
        return $queryBuilder->getQuery()->getResult();
    }

    public function updateCommande($idCommande, $statutCommande) {
        $em = EntityManager::getInstance();
        $commande = $this->find($idCommande);
        $commande->setStatutCommande($statutCommande);
        $em->persist($commande);
        $em->flush();
    }
}
