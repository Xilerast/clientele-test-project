<?php

return [
    'database' => [
        'name' => 'clientele_testdb',
        'table_name' => 'clients',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1;',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];

?>