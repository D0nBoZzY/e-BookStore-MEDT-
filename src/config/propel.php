<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'ebookstore' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=ebookstore',
                    'user'       => 'ebookstore',
                    'password'   => 'ebookstore',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'ebookstore',
            'connections' => ['ebookstore']
        ],
        'generator' => [
            'defaultConnection' => 'ebookstore',
            'connections' => ['ebookstore']
        ]
    ]
];
