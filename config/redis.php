<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

/**
 * redis setting
 */
return [
    /**
     * default
     */
    'default' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'port' => env('REDIS_PORT', 6379),
        'password' => env('REDIS_PASSWORD', null),
        'database' => 0,
        'time_out' => 1,
        'size' => swoole_cpu_num() * 2 + 1,
    ],
    /**
     * cache
     */
    'cache' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'port' => env('REDIS_PORT', 6379),
        'password' => env('REDIS_PASSWORD', null),
        'database' => 1,
        'time_out' => 1,
        'size' => swoole_cpu_num() * 2 + 1,
    ],
    /**
     * session
     */
    'session' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'port' => env('REDIS_PORT', 6379),
        'password' => env('REDIS_PASSWORD', null),
        'database' => 2,
        'time_out' => 1,
        'size' => swoole_cpu_num() * 2 + 1,
    ]
];
