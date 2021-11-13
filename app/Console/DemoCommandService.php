<?php
/**
 * This file is part of zhishuo.
 * @auth lupeng
 * @date 2021/11/13 13:47
 */
declare(strict_types=1);

namespace App\Console;

use Mini\Command\AbstractCommandService;
use Swoole\Process;

class DemoCommandService extends AbstractCommandService
{

    public function handle(Process $process): void
    {
        $this->info('this is demo.');
    }

    public function getCommand(): string
    {
        return 'demo:show';
    }

    public function getCommandDescription(): string
    {
        return 'show the demo command service.';
    }
}