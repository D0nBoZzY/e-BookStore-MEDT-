<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'ebookstore' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=ebookstore',
                    'user'       => 'root',
                    'password'   => 'Abc1234',
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
