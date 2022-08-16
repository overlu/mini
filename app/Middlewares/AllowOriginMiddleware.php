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

class AllowOriginMiddleware implements MiddlewareInterface
{

    public function before(string $method, string $className): ?string
    {
        if (config('routes.cors.enable')) {
            $request = request();
            if ($request->isMethod('OPTIONS') && $request->header('sec-fetch-mode') === 'cors') {
                return '';
            }
        }

        return null;
    }

    /**
     * @param ResponseInterface $response
     * @param string $className
     * @return ResponseInterface
     */
    public function after(ResponseInterface $response, string $className): ResponseInterface
    {
        if (config('routes.cors.enable')) {
            return $response
                ->withStatus(200)
                ->withHeader('Access-Control-Allow-Origin', config('routes.cors.access_control_allow_origin', '*'))
                ->withHeader('Access-Control-Allow-Methods', config('routes.cors.access-control_allow_methods', '*'));
        }

        return $response;
    }
}
