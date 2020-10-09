<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

/**
 * register the command service , use php bin/artisan see
 */
return [
    \Mini\Command\HelloMiniCommandService::class,
    \Mini\Command\RouteCommandService::class,
    \Mini\Command\TestCommandService::class,
    \Mini\Command\LogStatusCommandService::class,
];