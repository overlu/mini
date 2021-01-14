<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Crontabs;


use Mini\Crontab\CrontabTaskInterface;

class DemoCrontabTask implements CrontabTaskInterface
{

    public function handle()
    {
        echo "demo\n";
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
        return '*/1 * * * * *';
    }

    public function status(): bool
    {
        return true;
    }
}