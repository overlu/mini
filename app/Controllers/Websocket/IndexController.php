<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class IndexController extends Controller
{
    /**
     * @param Server $server
     * @param Request $request
     * @param array $routeData
     */
    public function onOpen(Server $server, Request $request, array $routeData)
    {
        dump('open');
    }

    /**
     * @param Server $server
     * @param Frame $frame
     * @param array $routeData
     * @return string
     */
    public function onMessage(Server $server, Frame $frame, array $routeData)
    {
        return 'This is mini server, routeData: ' . json_encode($routeData, JSON_UNESCAPED_UNICODE) . ', message: ' . $frame->data;
    }

    /**
     * @param Server $server
     * @param $fd
     * @param array $routeData
     */
    public function onClose(Server $server, $fd, array $routeData)
    {
        dump('close');
    }
}
