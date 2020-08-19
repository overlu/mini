<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * view template path
     */
    'paths' => [
        resource_path('views'),
    ],
    /**
     * view template compiled path
     */
    'compiled' => env(
        'VIEW_COMPILED_PATH',
        runtime_path('views')
    ),
];