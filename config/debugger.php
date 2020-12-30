<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'enable_remote_debug' => env('REMOTE_DEBUG', false),

    'listener' => [
        'host' => '127.0.0.1',
        'port' => 9599
    ]
];