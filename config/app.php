<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Mini'),
    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */
    'timezone' => 'UTC',
//    'timezone' => 'Asia/Shanghai',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Mini encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
     |--------------------------------------------------------------------------
     | Hot Reload
     |--------------------------------------------------------------------------
     | Enable auto reload
     | If in production environment, should be false
     |
     */

    'hot_reload' => env('HOT_RELOAD', false),

    'watch_dir' => ['app', 'resources/views'],

    /*
     |--------------------------------------------------------------------------
     | Application Debug Mode
     |--------------------------------------------------------------------------
     |
     | When your application is in debug mode, detailed error messages with
     | stack traces will be shown on every error that occurs within your
     | application. If disabled, a simple generic error page is shown.
     |
     */

    'debug' => env('APP_DEBUG', false),

    /*
     | @var 'dark', 'light'
     */
    'debug_theme' => 'dark',

    /*
     | enable route cache
     */
    'route_cached' => env('ROUTE_CACHED', false),

    /*
     |--------------------------------------------------------------------------
     | Application URL
     |--------------------------------------------------------------------------
     |
     | This URL is used by the console to properly generate URLs when using
     | the Artisan command line tool. You should set this to the root of
     | your application so that it is used when running Artisan tasks.
     |
     */

    'url' => env('APP_URL', 'http://localhost'),

//    'asset_url' => env('ASSET_URL', null),

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

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */
    'providers' => [
        /**
         * Mini Framework Service Providers...
         */
        \Mini\Exception\ExceptionServiceProvider::class,
        \Mini\Config\ConfigServiceProvider::class,
        \Mini\Encryption\EncryptionServiceProvider::class,
        \Mini\Filesystem\FilesystemServiceProvider::class,
        \Mini\Events\EventServiceProvider::class,
        \Mini\Logging\LoggingServiceProvider::class,
        \Mini\Database\Mysql\EloquentServiceProvider::class,
        \Mini\Database\Mini\MiniDBServiceProvider::class,
        \Mini\Database\Redis\RedisServiceProvider::class,
        \Mini\Cache\CacheServiceProviders::class,
        \Mini\Translate\TranslateServiceProvider::class,
        \Mini\Validator\ValidationServiceProvider::class,
//        \Mini\Session\SessionServiceProvider::class,
        \Mini\Hashing\HashServiceProvider::class,
        \Mini\View\ViewServiceProvider::class,
//        \Mini\Service\WsServer\WebsocketDCSServiceProvider::class,
        \Mini\Console\ConsoleServiceProvider::class,
        /**
         * require mini-image
         */
//        \MiniImage\ImageServiceProvider::class,
        /**
         * require mini-captcha
         */
//        \MiniCaptcha\CaptchaServiceProvider::class,
        /**
         *  require mini-sms
         */
//        \MiniSMS\Providers\SMSServiceProvider::class,

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