<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Listeners;

use Mini\Service\WsServer\WebsocketDCSServiceProvider;
use Mini\Singleton;
use Mini\Support\Dotenv;
use Swoole\Server;

class MiniServer
{
    use Singleton;

    public function start(Server $server): void
    {
        if (in_array(WebsocketDCSServiceProvider::class, config('app.providers', []), true)) {
            $this->updateWebsocketServerHost();
        }
    }

    public function workerStart(Server $server, $workerId): void
    {
    }

    public function workerStop(Server $server, $workerId): void
    {
    }

    private function updateWebsocketServerHost(): void
    {
        $ips = swoole_get_local_ip();
        $innerHostIp = '';
        foreach ($ips as $ip) {
            if ($ip !== '127.0.0.1' && !filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                $innerHostIp = $ip;
                break;
            }
        }
        $innerHostIp && Dotenv::getInstance()->set('WEBSOCKET_SERVER_HOST', $innerHostIp);
    }
}