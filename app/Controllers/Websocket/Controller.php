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
     * Controller constructor.
     * @param array $routeData
     */
    public function __construct(array $routeData)
    {
    }

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
     * @param string $className
     * @param array $routeData
     * @return mixed
     */
    public function beforeDispatch(string $className, array $routeData)
    {
        return null;
    }

    /**
     * run after dispatch method
     * @param $response
     * @param Frame $frame
     * @param string $className
     * @param array $routeData
     * @return mixed
     */
    public function afterDispatch($response, Frame $frame, string $className, array $routeData)
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
     * @param int $fd
     * @param array $routeData
     * @param int $reactorId
     */
    public function onClose(Server $server, int $fd, array $routeData, int $reactorId)
    {
        // TODO: Implement onClose() method.
    }
}
