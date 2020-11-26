<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

use App\Listeners\MiniServer;

/**
 * register the event
 */
return [
    'server' => [
        'start' => [
            MiniServer::class,
            'start'
        ],
        'managerStart' => [
            MiniServer::class,
            'start'
        ],
        'workerStart' => [
            MiniServer::class,
            'workerStart'
        ],
    ],
    'events' => [
        /*\App\Events\TestEvent::class => \App\Listeners\TestListener::class,
        'test' => function () {
            dump('test');
        },*/
    ]
];
