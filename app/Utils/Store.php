<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Utils;

use Mini\Facades\Cache;

class Store
{
    /**
     * 获取数据仓库
     * @param string $key
     * @return array
     */
    public static function get(string $key): array
    {
        return (array)(Cache::get($key));
    }

    /**
     * 加入数据
     * @param string $key
     * @param $value
     * @return bool
     */
    public static function put(string $key, $value): bool
    {
        $values = static::get($key);
        $new_values = array_unique([...$values, ...(array)$value]);
        return Cache::set($key, $new_values);
    }

    /**
     * 清空仓库
     * @param string $key
     * @return bool
     */
    public static function drop(string $key): bool
    {
        return Cache::delete($key);
    }

    /**
     * 判断是否含有数据
     * @param string $key
     * @param $value
     * @return bool
     */
    public static function has(string $key, $value): bool
    {
        return in_array($value, static::get($key), true);
    }

    /**
     * 移除数据
     * @param string $key
     * @param $value
     * @return bool
     */
    public static function remove(string $key, $value): bool
    {
        $values = static::get($key);
        $index = array_search($value, $values, true);
        if ($index !== false) {
            unset($values[$index]);
            return Cache::set($key, $values);
        }
        return false;
    }
}