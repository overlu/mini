<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Providers;

use Mini\Support\ServiceProvider;
use Swoole\Server;

class AppServiceProvider extends ServiceProvider
{

    /**
     * @param Server|null $server
     * @param int|null $workerId
     */
    public function register(?Server $server = null, ?int $workerId = null): void
    {
        /*$this->app->bind(
            \Mini\Pagination\LengthAwarePaginator::class,
            function ($app, $options) {
                return new \App\Utils\Paginator($options['items'], $options['total'], $options['perPage'], $options['currentPage'], $options['options']);
            }
        );*/
    }

    /**
     * @param Server|null $server
     * @param int|null $workerId
     */
    public function boot(?Server $server = null, ?int $workerId = null): void
    {
        //
    }
}