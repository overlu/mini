<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

/**
 * database setting
 */
return [
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */
    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */
    'connections' => [
        'mysql' => [
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
//            'timezone' => env('DB_TIMEZONE', '+00:00'),
            'size' => swoole_cpu_num() * 2 + 1,   // 连接池数量
        ],

        /**
         * 'sqlite' => [
         * 'driver' => 'sqlite',
         * 'url' => env('DATABASE_URL'),
         * 'database' => env('DB_DATABASE', database_path('database.sqlite')),
         * 'prefix' => '',
         * 'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
         * ],
         *
         * 'mysql' => [
         * 'driver' => 'mysql',
         * 'url' => env('DATABASE_URL'),
         * 'host' => env('DB_HOST', '127.0.0.1'),
         * 'port' => env('DB_PORT', '3306'),
         * 'database' => env('DB_DATABASE', 'forge'),
         * 'username' => env('DB_USERNAME', 'forge'),
         * 'password' => env('DB_PASSWORD', ''),
         * 'unix_socket' => env('DB_SOCKET', ''),
         * 'charset' => 'utf8mb4',
         * 'collation' => 'utf8mb4_unicode_ci',
         * 'prefix' => '',
         * 'prefix_indexes' => true,
         * 'strict' => true,
         * 'engine' => null,
         * 'options' => extension_loaded('pdo_mysql') ? array_filter([
         * PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
         * ]) : [],
         * ],
         *
         * 'pgsql' => [
         * 'driver' => 'pgsql',
         * 'url' => env('DATABASE_URL'),
         * 'host' => env('DB_HOST', '127.0.0.1'),
         * 'port' => env('DB_PORT', '5432'),
         * 'database' => env('DB_DATABASE', 'forge'),
         * 'username' => env('DB_USERNAME', 'forge'),
         * 'password' => env('DB_PASSWORD', ''),
         * 'charset' => 'utf8',
         * 'prefix' => '',
         * 'prefix_indexes' => true,
         * 'schema' => 'public',
         * 'sslmode' => 'prefer',
         * ],
         *
         * 'sqlsrv' => [
         * 'driver' => 'sqlsrv',
         * 'url' => env('DATABASE_URL'),
         * 'host' => env('DB_HOST', 'localhost'),
         * 'port' => env('DB_PORT', '1433'),
         * 'database' => env('DB_DATABASE', 'forge'),
         * 'username' => env('DB_USERNAME', 'forge'),
         * 'password' => env('DB_PASSWORD', ''),
         * 'charset' => 'utf8',
         * 'prefix' => '',
         * 'prefix_indexes' => true,
         * ],
         */
    ]
];
