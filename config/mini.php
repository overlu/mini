<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'env' => env('APP_ENV', 'local'),
    'timezone' => 'Asia/Shanghai',
    'hot_reload' => true,    // 正式环境禁用
    'debug' => env('APP_DEBUG', false),
    'route_cached' => env('ROUTE_CACHED', false),
];
