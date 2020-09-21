<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Providers;

use Mini\Contracts\ServiceProviderInterface;
use Swoole\Server;

class AppServiceProvider implements ServiceProviderInterface
{

    public function register(?Server $server, ?int $workerId): void
    {

    }

    public function boot(?Server $server, ?int $workerId): void
    {

    }
}