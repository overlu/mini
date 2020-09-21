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
         * register app service
         */
        \App\Providers\AppServiceProvider::class,
        /**
         * register the file system service
         */
        \Mini\Support\FilesystemServiceProvider::class,

        /**
         * register the event service
         */
        \Mini\Events\EventServiceProvider::class,

        /**
         * register the eloquent service
         */
        \Mini\Database\Mysql\OrmServiceProvider::class,

        /**
         * register the simple db service
         */
        \Mini\Database\Mini\DbServiceProvider::class,

        /**
         * register the log service
         */
        \Mini\Logging\LoggingServiceProvider::class,

        /**
         * register the redis service
         */
        \Mini\Database\Redis\RedisServiceProvider::class,

        /**
         * register the view service
         */
        \Mini\View\ViewServiceProvider::class,

        /**
         * register translate service
         */
        \Mini\Translate\TranslateServiceProvider::class
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