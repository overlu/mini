<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use Mini\Service\WsServer\User;
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
//        $this->bindFd($request->fd);
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
     * @param int $fd
     * @param array $routeData
     * @param int $reactorId
     * @return void
     */
    public function onClose(Server $server, int $fd, array $routeData, int $reactorId): void
    {
        dump('close');
//        $this->unbindFd($fd);
    }

    /**
     * 绑定fd
     * @param int $fd
     * @return void
     */
    private function bindFd(int $fd): void
    {
        User::bind($this->user_id, $fd);
    }

    /**
     * 解绑fd
     * @param int $fd
     */
    private function unbindFd(int $fd): void
    {
        $uids = User::getUserByFd($fd);
        foreach ($uids as $uid) {
            User::unbind($uid, $fd);
        }
    }
}
