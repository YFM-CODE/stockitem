<?php
/**
 * Database Configuration Registry
 * config/database.php
 */

return [
    'default' => 'mysqli',
    
    'connections' => [
        'mysqli' => [
            'host'     => getenv('DB_HOST') ?: '127.0.0.1',
            'port'     => getenv('DB_PORT') ?: 3306,
            'database' => getenv('DB_DATABASE') ?: 'db_stokitem',
            'username' => getenv('DB_USERNAME') ?: 'root',
            'password' => getenv('DB_PASSWORD') ?: '',
            'charset'  => 'utf8mb4',
            'timezone' => getenv('APP_TIMEZONE') ?: 'Asia/Jakarta',
        ],
    ],
];
