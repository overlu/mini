<?php
/**
 * This file is part of mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Middlewares;

use Mini\Contracts\Middleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;

class FromWhichHostMiddleware implements MiddlewareInterface
{

    public function before(string $method, string $className)
    {
        return null;
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