<?php

use App\Controller\Homepage;
use App\Controller\Register;
use App\Controller\Login;
use App\Controller\insertionManga;
use App\Controller\gestionManga;
use App\Controller\modifierManga;
use Framework\Routing\Route;



return [
    'routing' => [
        new Route(['POST','GET'], '/', Homepage::class),
        new Route(['POST','GET'], '/register', Register::class),
        new Route(['POST','GET'], '/login', Login::class),
        new Route(['POST','GET'], '/insertionManga', insertionManga::class),
        new Route(['POST','GET'], '/gestionManga', gestionManga::class), 
        new Route(['POST','GET'], '/modifierManga', modifierManga::class),
    ]
];
