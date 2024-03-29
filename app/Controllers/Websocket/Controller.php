<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use Mini\Contracts\HttpMessage\WebsocketRequestInterface;
use RuntimeException;
use Mini\Contracts\HttpMessage\WebsocketControllerInterface;
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
     * @param mixed $data
     * @param string $success_message
     * @param int $code
     * @return array
     */
    public function success(string $action, mixed $data = [], string $success_message = 'succeed', int $code = 200): array
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
     * @param mixed $data
     * @param string $error_message
     * @param int $code
     * @return array
     */
    public function failed(string $action, mixed $data = [], string $error_message = 'failed', int $code = 0): array
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
    public function beforeDispatch(string $className, array $routeData): mixed
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
    public function afterDispatch($response, Frame $frame, string $className, array $routeData): mixed
    {
        return $response;
    }

    /**
     * @param Server $server
     * @param WebsocketRequestInterface $request
     * @param array $routeData
     */
    public function onOpen(Server $server, WebsocketRequestInterface $request, array $routeData)
    {
        //
    }

    /**
     * @param Server $server
     * @param Frame $frame
     * @param array $routeData
     */
    public function onMessage(Server $server, Frame $frame, array $routeData)
    {
        //
    }

    /**
     * @param Server $server
     * @param int $fd
     * @param array $routeData
     * @param int $reactorId
     */
    public function onClose(Server $server, int $fd, array $routeData, int $reactorId)
    {
        //
    }
}
