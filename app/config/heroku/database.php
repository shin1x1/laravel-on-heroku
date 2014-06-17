<?php

$postgresqlUrl = parse_url(getenv('DATABASE_URL'));
$redisUrl = parse_url(getenv('REDISTOGO_URL'));

return [
    'default' => 'pgsql',

    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $postgresqlUrl['host'],
            'database' =>  substr($postgresqlUrl['path'], 1),
            'username' => $postgresqlUrl['user'],
            'password' => $postgresqlUrl['pass'],
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],
    ],
    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => $redisUrl['host'],
            'port' => $redisUrl['port'],
            'database' => 0,
            'password' => $redisUrl['pass'],
        ],
    ],
];
