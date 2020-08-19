<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * define the default cache driver
     */
    'default' => env('CACHE_DRIVER', 'file'),

    /**
     * cache driver setting
     */
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

    /**
     * cache driver prefix
     */
    'prefix' => env('CACHE_PREFIX', ''),
];
