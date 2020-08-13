<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controller;

/**
 * Class Controller
 * @package App\Controller
 * @mixin \Mini\Service\HttpServer\Response | \Mini\Service\HttpMessage\Server\Response
 */
class Controller
{
    /**
     * @param array $data
     * @param string $success_message
     * @param int $code
     * @return array
     */
    protected function success(array $data = [], string $success_message = 'succeed', $code = 200): array
    {
        return [
            'requestId' => \SeasLog::getRequestID(),
            'status' => [
                'success' => true,
                'message' => $success_message,
                'code' => $code,
            ],
            'method' => request()->getMethod(),
            'data' => $data
        ];
    }

    /**
     * @param string $error_message
     * @param int $code
     * @return array
     */
    protected function failed($error_message = 'failed', $code = 0): array
    {
        return [
            'requestId' => \SeasLog::getRequestID(),
            'status' => [
                'success' => false,
                'message' => $error_message,
                'code' => $code,
            ],
            'method' => request()->getMethod(),
            'data' => []
        ];
    }

    public function __call($name, $arguments)
    {
        return response()->$name(...$arguments);
    }
}
