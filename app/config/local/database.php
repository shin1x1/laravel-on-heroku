<?php

return [
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => 'localhost',
            'database' => 'app',
            'username' => 'vagrant',
            'password' => 'secret',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],
    ],
];
