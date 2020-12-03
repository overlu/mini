<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
return [
    /**
     * register the provider when framework server start
     * register: before the framework initialize done, it can't use other service provider
     * boot: after the provider register, it can use other service provider
     */
    'providers' => [
        /**
         * Mini Framework Service Providers...
         */
        \Mini\Exceptions\ExceptionServiceProvider::class,
        \Mini\Filesystem\FilesystemServiceProvider::class,
        \Mini\Events\EventServiceProvider::class,
        \Mini\Database\Mysql\OrmServiceProvider::class,
        \Mini\Database\Mini\DbServiceProvider::class,
        \Mini\Logging\LoggingServiceProvider::class,
        \Mini\Database\Redis\RedisServiceProvider::class,
        \Mini\View\ViewServiceProvider::class,
        \Mini\Translate\TranslateServiceProvider::class,

        /**
         * Application Service Providers...
         */
        \App\Providers\AppServiceProvider::class,

    ],

    /**
     * register the request provider when the framework on request
     * before: before on request
     * after: after request
     */
    'requests' => [
        \Mini\Logging\LoggingRequestProvider::class
    ],

    /**
     * register the di mapping
     */
    'bind' => [
//        'xxxInterface' => 'xxx'
    ]
];