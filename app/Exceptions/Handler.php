<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Exceptions;

use Mini\Contracts\HttpMessage\RequestInterface;
use \Mini\Exception\Handler as MiniHandler;
use Throwable;

class Handler extends MiniHandler
{
    protected array $dontReport = [];

    public function report(Throwable $throwable): void
    {
        parent::report($throwable);
    }

    public function render(RequestInterface $request, Throwable $throwable): void
    {
        parent::render($request, $throwable);
    }
}