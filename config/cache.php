<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'default' => env('CACHE_DRIVER', 'file'),

    'drivers' => [
        'file' => [
            'path' => runtime_path('cache'),
//            'driver' => CustomFileCacheDriver::class
        ],
        'redis' => [
            'collection' => 'cache',
//            'driver' => CustomRedisCacheDriver::class
        ],
        'swoole' => [
//            'driver' => CustomSwooleCacheDriver::class
        ]
    ],
    'prefix' => env('CACHE_PREFIX', ''),
    'default_expire' => 0,
];
