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
        /*app()->bind(
            \Mini\Pagination\LengthAwarePaginator::class,
            function ($app, $options) {
                return new \App\Utils\Paginator($options['items'], $options['total'], $options['perPage'], $options['currentPage'], $options['options']);
            }
        );*/
    }

    public function boot(?Server $server, ?int $workerId): void
    {

    }
}