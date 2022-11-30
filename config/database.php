<?php

return [
    'ENTITY_PATH' => dirname(__DIR__) . '/src/App/Entity',
    'DATABASE_CONFIG' => [
        'driver' => 'pdo_mysql',
        'dbname' => 'test',
        'user' => 'root',
        'password' => '',
        'host' => '127.0.0.1',
    ],
];
