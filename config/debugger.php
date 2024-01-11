<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
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


    'enable_remote_debug' => env('REMOTE_DEBUG', false),

    'listener' => [
        'host' => '127.0.0.1',
        'port' => 9599
    ],

    /**
     * exception
     */
    'exception' => [
        'show_trace' => true
    ]
];