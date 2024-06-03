<?php
/**
 * This file is part of mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Listeners;

use Mini\Logging\LoggingEvent;

/**
 * Class LoggerListener
 * @package App\Listeners
 */
class LoggerListener
{
    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function info(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function alert(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function warning(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function error(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function debug(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function emergency(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function critical(LoggingEvent $event): void
    {
        //
    }

    /**
     * @param LoggingEvent $event
     * @return void
     */
    public function notice(LoggingEvent $event): void
    {
        //
    }
}