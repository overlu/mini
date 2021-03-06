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
//    protected static array $headers = ["Content-type" => "application/json;charset='utf-8'", "Accept" => "application/json"];
//    protected static array $headers = ["Content-type"=> "text/plain;charset=UTF-8"];

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
        $client->post($scheme['path'] ?? '/', $data);
        $content = $client->getBody();
        $client->close();
        return is_json($content) ? json_decode($content, true) : $content;
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
        $client->get(($scheme['path'] ?? '/') . '?' . http_build_query($data));
        $content = $client->getBody();
        $client->close();
        return is_json($content) ? json_decode($content, true) : $content;
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
        $result = $client->download($scheme['path'] ?? '/', $saveFile);
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
     * @param array $data
     * @param array $headers
     * @param array $cookies
     * @return mixed
     */
    public static function execute(string $method, string $url, array $data = [], array $headers = [], array $cookies = [])
    {
        $scheme = self::parseUrl($url);
        $client = new Client($scheme['host'], $scheme['port'], $scheme['ssl']);
        $client->setHeaders($headers);
        $client->set(['timeout' => 5]);
        $client->setData($data);
        $client->setCookies($cookies);
        $client->setMethod(strtoupper($method));
        $client->execute($scheme['path'] ?? '/');
        $content = $client->getBody();
        $client->close();
        return is_json($content) ? json_decode($content, true) : $content;
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
        $scheme['port'] = $scheme['port'] ?? 80;
        $scheme['ssl'] = strtolower($scheme['scheme']) === 'https';
        return $scheme;
    }
}
