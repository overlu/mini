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
     * @var 'dark', 'light'
     */
    'debug_theme' => 'dark',

    /**
     * enable route cache
     */
    'route_cached' => env('ROUTE_CACHED', false),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

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
        \Mini\Validator\ValidationServiceProvider::class,
        \Mini\Hashing\HashServiceProvider::class,


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