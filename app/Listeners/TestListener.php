<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Listeners;

class TestListener
{
    public function handle()
    {
        dump('test start');
        sleep(3);
        dump('test end');
    }
}