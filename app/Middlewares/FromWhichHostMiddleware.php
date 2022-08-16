<?php
/**
 * This file is part of zhishuo.
 * @auth lupeng
 * @date 2021/11/23 19:59
 */
declare(strict_types=1);

namespace App\Middlewares;

use Mini\Contracts\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;

class FromWhichHostMiddleware implements MiddlewareInterface
{

    public function before(string $method, string $className)
    {
    }

    /**
     * @param ResponseInterface $response
     * @param string $className
     * @return ResponseInterface
     */
    public function after(ResponseInterface $response, string $className): ResponseInterface
    {
        return $response->withHeader('From-host', env('WEBSOCKET_SERVER_HOST'));
    }
}