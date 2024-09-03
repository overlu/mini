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
     * @return bool
     */
    public function handle(?Process $process): bool
    {
        $this->info('this is demo.');
        return true;
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