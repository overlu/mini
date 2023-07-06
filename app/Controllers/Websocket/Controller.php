<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use RuntimeException;
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
     * @param string $action
     * @param array $data
     * @param string $success_message
     * @param int $code
     * @return array
     */
    public function success(string $action, $data = [], string $success_message = 'succeed', int $code = 200): array
    {
        if ($code < 200 || $code > 300) {
            throw new RuntimeException('success code should between 200 and 300, ' . $code . 'given');
        }
        return [
            'code' => $code,
            'action' => $action,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string $action
     * @param array $data
     * @param string $error_message
     * @param int $code
     * @return array
     */
    public function failed(string $action, $data = [], string $error_message = 'failed', int $code = 0): array
    {
        if ($code >= 200 && $code < 300) {
            throw new RuntimeException('error code should not between 200 and 300, ' . $code . 'given');
        }
        return [
            'code' => $code,
            'action' => $action,
            'message' => $error_message,
            'data' => $data
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
