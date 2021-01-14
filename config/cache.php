<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

use Swoole\Table;

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
            /**
             * @see https://wiki.swoole.com/#/memory/table?id=__construct
             */
            'table' => [
                'size' => 4096,
                'conflict_proportion' => 0.2
            ],
            'column' => [
                'value' => [
                    'size' => 4096,
                    'type' => Table::TYPE_STRING
                ],
                'expire' => [
                    'size' => 4,
                    'type' => Table::TYPE_INT
                ]
            ]
//            'driver' => CustomSwooleCacheDriver::class
        ]
    ],

    /**
     * cache driver prefix
     */
    'prefix' => env('CACHE_PREFIX', ''),
];
