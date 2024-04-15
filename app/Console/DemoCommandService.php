<?php
/**
 * This file is part of mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Console;

use Mini\Command\AbstractCommandService;
use Swoole\Process;

class DemoCommandService extends AbstractCommandService
{
    /**
     * @param Process|null $process
     * @return void
     */
    public function handle(?Process $process): void
    {
        $this->info('this is demo.');
    }

    /**
     * command
     * @return string
     */
    public function getCommand(): string
    {
        return 'demo:show';
    }

    /**
     * command service description
     * @return string
     */
    public function getCommandDescription(): string
    {
        return 'show the demo command service.';
    }
}