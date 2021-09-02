<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */

declare(strict_types=1);

return [
    /**
     * enable crontab task
     */
    'enable_crontab' => env('ENABLE_CRONTAB', false),

    /**
     *
     */
    'enable_crontab_log' => env('ENABLE_CRONTAB_LOG', false),

    /**
     * enable crontab coroutine
     */
    'enable_crontab_coroutine' => true,

    /**
     * crontab task list
     * \Mini\Crontab\CrontabTaskInterface[]
     */
    'crontab_task_list' => [
//        \App\Crontab\DemoCrontabTask::class
    ]
];