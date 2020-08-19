<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
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