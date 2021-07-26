<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'name' => env('APP_NAME', 'Mini'),
    /**
     * the default framework env
     * local, dev, production
     */
    'env' => env('APP_ENV', 'local'),

    /**
     * default timezone
     */
    'timezone' => 'UTC',

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

    'locale' => 'zh_CN',

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
        \Mini\Exception\ExceptionServiceProvider::class,
        \Mini\Filesystem\FilesystemServiceProvider::class,
        \Mini\Events\EventServiceProvider::class,
        \Mini\Cache\CacheServiceProviders::class,
        \Mini\Logging\LoggingServiceProvider::class,
        \Mini\Database\Mysql\EloquentServiceProvider::class,
        \Mini\Database\Redis\RedisServiceProvider::class,
        \Mini\Translate\TranslateServiceProvider::class,
        \Mini\Validator\ValidationServiceProvider::class,
        \Mini\Session\SessionServiceProvider::class,
        \Mini\Hashing\HashServiceProvider::class,
        \Mini\View\ViewServiceProvider::class,
        \Mini\Service\WsServer\WebsocketDCSServiceProvider::class,
        \Mini\Console\ConsoleServiceProvider::class,


        /**
         * Application Service Providers...
         */
        \App\Providers\AppServiceProvider::class,
    ],

    /**
     * register the middleware
     */
    'middleware' => [
        \Mini\Logging\RequestIdMiddleware::class,
//        \Mini\Session\SessionMiddleware::class,
    ],

    /**
     * register the di mapping
     */
    'bind' => [
//        'xxxInterface' => 'xxx'
    ]
];