<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'default' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => (int)env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'mini'),
        'username' => env('DB_USERNAME', 'mini'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix' => env('DB_PREFIX', ''),
        'options' => [
//        \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
//        \PDO::ATTR_PERSISTENT => false, // 关闭持久连接
//        \PDO::ATTR_EMULATE_PREPARES => true //开启预模拟预处理语句
        ],
        'strict' => true,
        'engine' => null,
        'size' => swoole_cpu_num() * 2 + 1,   // 连接池数量
    ]
];
