<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
return [
    'providers' => [
        \Mini\Support\FilesystemServiceProvider::class,
        \Mini\Events\EventServiceProvider::class,
        \Mini\Database\Mysql\OrmServiceProvider::class,
        \Mini\Database\Mini\DbServiceProvider::class,
        \Mini\Logging\LoggingServiceProvider::class,
        \Mini\Database\Redis\RedisServiceProvider::class,
        \Mini\View\ViewServiceProvider::class,
    ],
    'requests' => [
        \Mini\Logging\LoggingRequestProvider::class
    ],
    'bind' => [
    ]
];