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
        'workerStop' => [
            MiniServer::class,
            'workerStop'
        ]
    ],
    'events' => [
        /*\App\Events\DemoEvent::class => \App\Listeners\DemoListener::class,
        'test' => function () {
            dump('test');
        },*/
    ]
];
