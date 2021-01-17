<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers;

use Exception;
use Mini\Contracts\HttpMessage\ControllerInterface;
use Mini\Service\HttpMessage\Server\Response;
use function response;

/**
 * Class Controller
 * @package App\Controller
 * @mixin \Mini\Service\HttpServer\Response | Response
 */
class Controller implements ControllerInterface
{
    /**
     * @param string|null $success_message
     * @param array $data
     * @return array
     */
    public function success(?string $success_message = 'succeed', array $data = []): array
    {
        return [
            'code' => 200,
            'message' => $success_message,
            'data' => $data
        ];
    }

    /**
     * @param string|null $error_message
     * @param int $code
     * @return array
     */
    public function failed(?string $error_message = 'failed', $code = 0): array
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
