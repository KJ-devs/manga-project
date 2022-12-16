<?php

use App\Controller\Homepage;
use App\Controller\Register;
use App\Controller\Login;
use App\Controller\insertionManga;
use App\Controller\gestionManga;
use App\Controller\modifierManga;
use App\Controller\pageProduit;
use App\Controller\Panier;
use App\Controller\gestionCommande;
use App\Controller\vosCommandes;
use Framework\Routing\Route;



return [
    'routing' => [
        new Route(['POST','GET'], '/', Homepage::class),
        new Route(['POST','GET'], '/register', Register::class),
        new Route(['POST','GET'], '/login', Login::class),
        new Route(['POST','GET'], '/insertionManga', insertionManga::class),
        new Route(['POST','GET'], '/gestionManga', gestionManga::class), 
        new Route(['POST','GET'], '/modifierManga', modifierManga::class),
        new Route(['POST','GET'], '/produit', pageProduit::class),
        new Route(['POST','GET'], '/panier', Panier::class),
        new Route(['POST','GET'], '/gestionCommande', gestionCommande::class),
        new Route(['POST','GET'], '/vosCommandes', vosCommandes::class),

    ]
];
