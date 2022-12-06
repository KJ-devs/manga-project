<?php

use App\Controller\Homepage;
use App\Controller\Register;
use Framework\Routing\Route;



return [
    'routing' => [
        new Route(['POST','GET'], '/', Homepage::class),
        new Route(['POST','GET'], '/register', Register::class),
        new Route(['POST','GET'], '/login', Login::class),
        
    ]
];
