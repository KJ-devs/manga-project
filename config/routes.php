<?php

use App\Controller\Homepage;
use App\Controller\Register;
use Framework\Routing\Route;



return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['POST','GET'], '/register', Register::class),
        
    ]
];
