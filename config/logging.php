<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * The logging default path
     */
    'default_base_path' => runtime_path('logs'),
    'default_logger' => '.',

    /**
     * the types, will print the log on the console
     * ALL, ERROR, DEBUG, INFO, ALTER, CRITICAL, EMERGENCY, NOTICE
     */
    'output' => env('LOGGING_OUTPUT', false),

    /**
     * Enable database query log, not use in mini db driver
     */
    'database_query_log_enabled' => env('DATABASE_QUERY_LOG_ENABLE', false),

    /**
     * Only record queries when the QUERY_LOG_TRIGGER is set in the environment,
     * or when the trigger HEADER, GET, POST, or COOKIE variable is set
     */
    'database_query_log_trigger' => env('DATABASE_QUERY_LOG_TRIGGER', false),

    /**
     * Only record queries that are slower than the following time
     * Unit: milliseconds
     */
    'slower_than' => 0,

    /**
     * register the logger listener
     */
//    'listen' => \App\Listeners\LoggerListener::class
];
