<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers\Http;

use Exception;
use Mini\Contracts\HttpMessage\HttpControllerInterface;
use RuntimeException;

/**
 * Class Controller
 * @package App\Controllers\Http\V1
 */
class Controller implements HttpControllerInterface
{
    /**
     * Controller constructor.
     * @param string $method
     */
    public function __construct(string $method)
    {
    }

    /**
     * @param array|mixed $data
     * @param string $success_message
     * @param int $code
     * @return array
     */
    public function success(mixed $data = [], string $success_message = 'succeed', int $code = 200): array
    {
        if ($code < 200 || $code >= 300) {
            throw new RuntimeException('success code should between 200 and 300, ' . $code . ' given');
        }
        return [
            'code' => $code,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string $error_message
     * @param int $code
     * @param mixed|array $data
     * @return array
     */
    public function failed(string $error_message = 'failed', int $code = 0, mixed $data = []): array
    {
        if ($code >= 200 && $code < 300) {
            throw new RuntimeException('error code should not between 200 and 300, ' . $code . ' given');
        }
        return [
            'code' => $code,
            'message' => $error_message,
            'data' => $data
        ];
    }

    /**
     * run before dispatch method
     * @param $method
     * @return mixed
     * @throws Exception
     */
    public function beforeDispatch($method): mixed
    {
        return null;
    }

    /**
     * run after dispatch method
     * @param $response
     * @return mixed
     */
    public function afterDispatch($response): mixed
    {
        return $response;
    }

    /**
     * @param string $middleware
     * @param string $type [before, after]
     * @return bool
     */
    public function disableMiddleware(string $middleware, string $type): bool
    {
        return false;
    }
}
