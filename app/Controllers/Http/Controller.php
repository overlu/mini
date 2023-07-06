<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Http;

use Mini\Contracts\HttpMessage\HttpControllerInterface;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller implements HttpControllerInterface
{
    /**
     * @param mixed $data
     * @param string $success_message
     * @param int $code
     * @return array
     */
    public function success($data = [], string $success_message = 'succeed', int $code = 200): array
    {
        return [
            'code' => 200,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string $error_message
     * @param int $code
     * @return array
     */
    public function failed(string $error_message = 'failed', int $code = 0): array
    {
        return [
            'code' => $code,
            'message' => $error_message,
        ];
    }

    /**
     * run before dispatch method
     * @param $method
     * @return mixed
     */
    public function beforeDispatch($method)
    {
        return null;
    }

    /**
     * run after dispatch method
     * @param $response
     * @return mixed
     */
    public function afterDispatch($response)
    {
        return $response;
    }

    /**
     * disable the register middleware
     * @param string $middleware
     * @return bool
     */
    public function disableMiddleware(string $middleware): bool
    {
        return false;
    }
}
