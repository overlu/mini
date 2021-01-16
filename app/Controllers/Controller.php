<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers;

use Exception;
use Mini\Service\HttpMessage\Server\Response;
use function response;

/**
 * Class Controller
 * @package App\Controller
 * @mixin \Mini\Service\HttpServer\Response | Response
 */
class Controller
{
    /**
     * @param string|null $success_message
     * @param array $data
     * @param int $code
     * @return array
     */
    protected function success(?string $success_message = 'succeed', array $data = [], $code = 200): array
    {
        return [
            'code' => $code,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string|null $error_message
     * @param int $code
     * @return array
     */
    protected function failed(?string $error_message = 'failed', $code = 0): array
    {
        return [
            'code' => $code,
            'message' => $error_message,
        ];
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        return response()->$name(...$arguments);
    }
}
