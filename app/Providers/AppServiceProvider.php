<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Providers;

use Mini\Service\AbstractServiceProvider;

class AppServiceProvider extends AbstractServiceProvider
{
    public function register(): void
    {
        /*$this->app->bind(
            \Mini\Pagination\LengthAwarePaginator::class,
            function ($app, $options) {
                return new \App\Utils\Paginator($options['items'], $options['total'], $options['perPage'], $options['currentPage'], $options['options']);
            }
        );*/
    }

    public function boot(): void
    {
        //
    }
}