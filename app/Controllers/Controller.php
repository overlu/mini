<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Controllers;

use Mini\Contracts\HttpMessage\ControllerInterface;

/**
 * Class Controller
 * @package App\Controller
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
}
