<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Listens;

use Mini\Singleton;
use Swoole\Server;

class MiniServer
{
    use Singleton;

    public function start(Server $server): void
    {
    }

    public function workerStart(Server $server, $workerId): void
    {
    }
}