<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * the default framework env
     * local, dev, production
     */
    'env' => env('APP_ENV', 'local'),

    /**
     * default timezone
     */
    'timezone' => 'Asia/Shanghai',

    /**
     * enable auto reload
     * if in production environment, should be false
     */
    'hot_reload' => true,

    /**
     * enable debug model, if true, will show debug info
     */
    'debug' => env('APP_DEBUG', false),

    /**
     * enable route cache
     */
    'route_cached' => env('ROUTE_CACHED', false),

    /**
     * default translate language
     */
    'language' => 'zh_CN',
];
