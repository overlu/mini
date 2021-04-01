<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Websocket;

use Swoole\WebSocket\Frame;

class IndexController extends Controller
{
    /**
     * @param Frame $frame
     * @param $routeData
     * @return string
     */
    public function message(Frame $frame, $routeData): string
    {
        return 'This is mini server, routeData: ' . json_encode((array)$routeData, JSON_UNESCAPED_UNICODE) . 'message: ' . $frame->data;
    }
}
