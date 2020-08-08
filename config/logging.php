<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
return [
    'default_basepath' => runtime_path('logs'),
    'default_logger' => '.',
    'output' => env('LOGGING_OUTPUT', false) // 输出到控制台
];