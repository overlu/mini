<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * the logging default path
     */
    'default_basepath' => runtime_path('logs'),
    'default_logger' => '.',

    /**
     * if true, will print the log on the console
     */
    'output' => env('LOGGING_OUTPUT', false)
];