<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Events;

use Swoole\WebSocket\Server;

class WebSocket
{
    public static function onOpen(Server $server, $request)
    {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public static function onMessage(Server $server, $frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, 'this is server');
    }

    public static function onClose(Server $server, $fd)
    {
    }
}
