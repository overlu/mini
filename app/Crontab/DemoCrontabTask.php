<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Crontab;

use Exception;
use Mini\Crontab\AbstractCrontabTask;
use Mini\Support\Command;

class DemoCrontabTask extends AbstractCrontabTask
{

    public function handle()
    {
        Command::info('success');
        return 'done';
    }

    public function name(): string
    {
        return 'demo';
    }

    public function description(): string
    {
        return 'demo crontab';
    }

    public function rule(): string
    {
        return $this->everySecond();
    }

    public function status(): bool
    {
        return true;
    }

    public function success($result): void
    {
        dump($result);
    }

    public function fail(Exception $exception): void
    {
        dump($exception);
    }
}