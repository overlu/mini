<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * 缓存驱动，分布式部署时禁止使用文件，swoole等缓存驱动
     */
    'cache_driver' => 'redis',

    /**
     * 本机服务地址，建议内网地址
     */
    'host' => env('WEBSOCKET_SERVER_HOST', '127.0.0.1'),

    /**
     * 本机服务端口
     */
    'port' => env('WEBSOCKET_SERVER_PORT', '9501'),

    /**
     * 密钥，确保分布式部署时每台服务器都一致
     */
    'secret_key' => 'HI^FLF%(FCL$IF1AX(&%O',
];