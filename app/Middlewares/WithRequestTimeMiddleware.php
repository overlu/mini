<?php
/**
 * This file is part of mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Middlewares;

use Mini\Contracts\Middleware\MiddlewareInterface;
use Mini\Service\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;

class WithRequestTimeMiddleware implements MiddlewareInterface
{


    private float $requestTime;
    private float $responseTime;

    public function before(string $method, string $className): ?string
    {
        $this->requestTime = round(microtime(true) * 1000);

        return null;
    }

    /**
     * @param ResponseInterface $response
     * @param string $className
     * @return ResponseInterface
     */
    public function after(ResponseInterface $response, string $className): ResponseInterface
    {
        $content = $response->getBody()->getContents();
        if (is_json($content)) {
            $this->responseTime = round(microtime(true) * 1000);
            $contentData = $this->computeRequestTime(json_decode($content, true));
            return $response->withBody(new SwooleStream(json_encode($contentData, JSON_UNESCAPED_UNICODE)));
        }
        return $response;
    }

    public function computeRequestTime(array $content): array
    {
        $executionTime = $this->responseTime - $this->requestTime;
        $content['request_time'] = $this->requestTime;
//        $content['response_time'] = $this->responseTime;
        if ($executionTime < 1000) {
            $content['execution_time'] = round($executionTime, 2) . 'ms';
        } elseif ($executionTime < 60000) {
            $content['execution_time'] = round($executionTime / 1000, 2) . 's';
        } else {
            $content['execution_time'] = round($executionTime / 60000, 2) . 'min';
        }

        return $content;
    }
}
