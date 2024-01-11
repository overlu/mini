<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Events;

use Mini\Service\Server\Protocol\MQTT;
use Mini\Contracts\HttpMessage\MqttInterface;
use Swoole\Server;

class MqttServer implements MqttInterface
{
    public function onMqConnect(Server $server, int $fd, $fromId, $data): void
    {
        if ($data['protocol_name'] !== "MQTT") {
            $server->close($fd);
            return;
        }

        /**
         * @TODO
         * 判断客户端是否已经连接，如果是需要断开旧的连接
         * 判断是否有遗嘱信息
         * ...
         */

        // 返回确认连接请求
        $server->send(
            $fd,
            MQTT::getAck(
                [
                    'cmd' => 2, // CONNACK固定值为2
                    'code' => 0, // 连接返回码 0表示连接已被服务端接受
                    'session_present' => 0
                ]
            )
        );
    }

    public function onMqPingreq(Server $server, int $fd, $fromId, $data): bool
    {
        //
        return true;
    }

    public function onMqDisconnect(Server $server, int $fd, $fromId, $data): bool
    {
        //
        return true;
    }

    public function onMqPublish(Server $server, int $fd, $fromId, $data)
    {
        //
    }

    public function onMqSubscribe(Server $server, int $fd, $fromId, $data)
    {
        //
    }

    public function onMqUnsubscribe(Server $server, int $fd, $fromId, $data)
    {
        //
    }
}
