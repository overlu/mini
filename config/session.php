<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * Default Session Driver
     * support: redis, file, null
     */
    'driver' => env('SESSION_DRIVER', 'file'),

    /**
     * Session Lifetime
     * minute
     */
    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /**
     * Session File Location
     */
    'files' => runtime_path('sessions'),

    /**
     * Session Redis Connection
     */
    'connection' => env('SESSION_CONNECTION', 'session'),

    /**
     * Session Cookie Name
     */
    'session_name' => env('SESSION_NAME', 'MINI_SESSION_ID'),

    /**
     * Session Cookie Path
     */
    'path' => '/',

    /**
     * Session Cookie Domain
     */
    'domain' => env('SESSION_DOMAIN', null),

    /**
     * HTTP Access Only
     */
    'http_only' => true,
];
