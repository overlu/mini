<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use Mini\Contracts\HttpMessage\WebsocketControllerInterface;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller implements WebsocketControllerInterface
{
    /**
     * @param string|null $success_message
     * @param array $data
     * @return array
     */
    public function success(?string $success_message = 'succeed', array $data = []): array
    {
        return [
            'code' => 200,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string|null $error_message
     * @param int $code
     * @return array
     */
    public function failed(?string $error_message = 'failed', $code = 0): array
    {
        return [
            'code' => $code,
            'message' => $error_message,
        ];
    }

    /**
     * run before dispatch method
     * @param $method
     * @return mixed
     */
    public function beforeDispatch($method)
    {
        return null;
    }

    /**
     * run after dispatch method
     * @param $response
     * @return mixed
     */
    public function afterDispatch($response)
    {
        return $response;
    }

    /**
     * @param Server $server
     * @param Request $request
     * @param array $routeData
     */
    public function onOpen(Server $server, Request $request, array $routeData)
    {
        // TODO: Implement onOpen() method.
    }

    /**
     * @param Server $server
     * @param Frame $frame
     * @param array $routeData
     */
    public function onMessage(Server $server, Frame $frame, array $routeData)
    {
        // TODO: Implement onMessage() method.
    }

    /**
     * @param Server $server
     * @param $fd
     * @param array $routeData
     */
    public function onClose(Server $server, $fd, array $routeData)
    {
        // TODO: Implement onClose() method.
    }
}
