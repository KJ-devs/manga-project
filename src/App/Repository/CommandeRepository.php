<?php

namespace App\Repository;

use App\Entity\Commande;
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

    
}
