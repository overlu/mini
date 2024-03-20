<?php
/**
 * This file is part of Reel.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Utils;

use App\Exceptions\RequestException;
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
     * @param mixed|array $data
     * @param array $headers
     * @return false|string
     */
    public static function post(string $url, mixed $data = [], array $headers = []): bool|string
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->post($scheme['path'] . (empty($scheme['query']) ? '' : '?' . $scheme['query']), $data);
        $client->getStatusCode();
        $content = $client->getBody();
        $client->close();
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException($content, $statusCode);
    }

    /**
     * @param string $url
     * @param mixed $data
     * @param array $headers
     * @return mixed
     */
    public static function postJson(string $url, mixed $data = [], array $headers = []): mixed
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->post($scheme['path'] . (empty($scheme['query']) ? '' : '?' . $scheme['query']), $data);
        $content = json_decode($client->getBody(), true);
        $client->close();
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException($content, $statusCode);
    }

    /**
     * get请求
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return false|string
     */
    public static function get(string $url, array $data = [], array $headers = []): bool|string
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->get($scheme['path'] . '?' . http_build_query($data));
        $content = $client->getBody();
        $client->close();
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException($content, $statusCode);
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    public static function getJson(string $url, array $data = [], array $headers = []): mixed
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->get($scheme['path'] . '?' . http_build_query($data));
        $content = json_decode($client->getBody(), true);
        $client->close();
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException($content, $statusCode);
    }

    /**
     * delete请求
     * @param string $url
     * @param array $headers
     * @return false|string
     */
    public static function delete(string $url, array $headers = []): bool|string
    {
        return static::execute('DELETE', $url, [], $headers);
    }

    /**
     * 下载文件
     * @param string $url
     * @param string $saveFile
     * @return bool
     */
    public static function download(string $url, string $saveFile): bool
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->set(['timeout' => -1]);
        $content = $client->download($scheme['path'], $saveFile);
        $client->close();
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException('download error', $statusCode);
    }

    /**
     * @param $name
     * @param $arguments
     * @return false|string
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
     * @return false|string
     */
    public static function execute(string $method, string $url, mixed $data = [], array $headers = [], array $cookies = [])
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
        if (($statusCode = $client->getStatusCode()) && $statusCode >= 200 && $statusCode < 300) {
            return $content;
        }
        throw new RequestException($content, $statusCode);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|string $data
     * @param array $headers
     * @param array $cookies
     * @return Client
     */
    public static function run(string $method, string $url, mixed $data = [], array $headers = [], array $cookies = []): Client
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
        $client->close();
        return $client;
    }

    /**
     * @param string $url
     * @return string|array|bool|int|null
     */
    public static function parseUrl(string $url): string|array|bool|int|null
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
