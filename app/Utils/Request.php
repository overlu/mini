<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Utils;

use RuntimeException;
use Swoole\Coroutine\Http\Client;

/**
 * Class Request
 * @package App\Utils
 */
class Request
{
    /**
     * post请求
     * @param string $url
     * @param mixed $data
     * @param array $headers
     * @return mixed
     */
    public static function post(string $url, $data = [], array $headers = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->post($scheme['path'] . (empty($scheme['query']) ? '' : '?' . $scheme['query']), $data);
        $content = $client->getBody();
        $client->close();
        return $content;
    }

    /**
     * @param string $url
     * @param mixed $data
     * @param array $headers
     * @return mixed
     */
    public static function postJson(string $url, $data = [], array $headers = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->post($scheme['path'] . (empty($scheme['query']) ? '' : '?' . $scheme['query']), $data);
        $content = json_decode($client->getBody(), true);
        $client->close();
        return $content;
    }

    /**
     * get请求
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    public static function get(string $url, array $data = [], array $headers = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->get($scheme['path'] . '?' . http_build_query($data));
        $content = $client->getBody();
        $client->close();
        return $content;
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    public static function getJson(string $url, array $data = [], array $headers = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->get($scheme['path'] . '?' . http_build_query($data));
        $content = json_decode($client->getBody(), true);
        $client->close();
        return $content;
    }

    /**
     * delete请求
     * @param string $url
     * @param array $headers
     * @return mixed
     */
    public static function delete(string $url, array $headers = [])
    {
        return static::execute('DELETE', $url, [], $headers);
    }

    /**
     * 下载文件
     * @param string $url
     * @param string $saveFile
     * @return mixed
     */
    public static function download(string $url, string $saveFile)
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->set(['timeout' => -1]);
        $result = $client->download($scheme['path'], $saveFile);
        $client->close();
        return $result;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::execute($name, ...$arguments);
    }

    /**
     * @param string $method
     * @param string $url
     * @param mixed $data
     * @param array $headers
     * @param array $cookies
     * @return mixed
     */
    public static function execute(string $method, string $url, $data = [], array $headers = [], array $cookies = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->set(['timeout' => 5]);
        if (!empty($data)) {
            $client->setData($data);
        }
        if (!empty($cookies)) {
            $client->setCookies($cookies);
        }
        if (!empty($headers)) {
            $client->setHeaders($headers);
        }
        $client->setMethod(strtoupper($method));
        $client->execute($scheme['path']);
        $content = $client->getBody();
        $client->close();
        return $content;
    }

    /**
     * @param string $url
     * @return array|false|int|string|null
     */
    public static function parseUrl(string $url)
    {
        $scheme = parse_url($url);
        if (!isset($scheme['host'])) {
            throw new RuntimeException('Illegal url format: ' . $url);
        }
        $scheme['scheme'] = $scheme['scheme'] ?? 'http';
        if (!in_array($scheme['scheme'], ['http', 'https'])) {
            throw new RuntimeException('unknown scheme "' . $scheme['scheme'] . '"');
        }
        $scheme['ssl'] = strtolower($scheme['scheme']) === 'https';
        $scheme['port'] = $scheme['port'] ?? ($scheme['ssl'] ? 443 : 80);
        $scheme['path'] = $scheme['path'] ?? '/';

        return $scheme;
    }
}
