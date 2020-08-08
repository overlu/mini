<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'start' => [
        [\App\Listens\MiniServer::class, 'start'],
    ],
    'managerStart' => [
        [\App\Listens\MiniServer::class, 'start'],
    ],
    'workerStart' => [
        [\App\Listens\MiniServer::class, 'workerStart'],
    ],
];
