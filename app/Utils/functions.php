<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

if (!function_exists('now')) {
    /**
     * @param string $format
     * @return false|string
     */
    function now(string $format = 'Y-m-d H:i:s')
    {
        return date($format);
    }
}