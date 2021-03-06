<?php

namespace Tests;

trait Bootstrap
{
    private static function boot()
    {
        ini_set('display_errors', 'on');
        ini_set('display_startup_errors', 'on');

        error_reporting(E_ALL);
        !defined('RUN_ENV') && define('RUN_ENV', 'testing');
        !defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));
        !defined('CONFIG_PATH') && define('CONFIG_PATH', dirname(__DIR__) . '/config/');

        require BASE_PATH . '/vendor/autoload.php';

        \Swoole\Runtime::enableCoroutine(SWOOLE_HOOK_ALL);
    }

    public static function setUpBeforeClass(): void
    {
        static::boot();
    }

    public static function tearDownAfterClass(): void
    {

    }
}
