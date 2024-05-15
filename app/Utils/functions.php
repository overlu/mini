<?php
/**
 * This file is part of Reel.
 * @auth lupeng
 */
declare(strict_types=1);

use Carbon\Carbon;

if (!function_exists('now')) {
    /**
     * @param DateTimeZone|string|null $tz
     * @return Carbon
     */
    function now(DateTimeZone|string|null $tz = null): Carbon
    {
        return Carbon::now($tz);
    }
}

if (!function_exists('today')) {
    /**
     * @param DateTimeZone|string|null $tz
     * @return Carbon
     */
    function today(DateTimeZone|string|null $tz = null): Carbon
    {
        return Carbon::today($tz);
    }
}

if (!function_exists('yesterday')) {
    /**
     * @param DateTimeZone|string|null $tz
     * @return Carbon
     */
    function yesterday(DateTimeZone|string|null $tz = null): Carbon
    {
        return Carbon::yesterday($tz);
    }
}

if (!function_exists('tomorrow')) {
    /**
     * @param DateTimeZone|string|null $tz
     * @return Carbon
     */
    function tomorrow(DateTimeZone|string|null $tz = null): Carbon
    {
        return Carbon::tomorrow($tz);
    }
}
