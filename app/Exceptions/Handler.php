<?php
/**
 * This file is part of Reel.
 * @auth lupeng
 */
declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Mini\Contracts\HttpMessage\WebsocketRequestInterface;
use Mini\Contracts\Request as RequestInterface;
use Mini\Exception\Handler as MiniHandler;
use Throwable;

class Handler extends MiniHandler
{
    /**
     * @var array
     */
    protected array $dontReport = [];

    /**
     * @param Throwable $throwable
     * @throws Throwable
     */
    public function report(Throwable $throwable): void
    {
        parent::report($throwable);
    }

    /**
     * @param RequestInterface|WebsocketRequestInterface $request
     * @param Throwable $throwable
     * @throws Exception
     */
    public function render($request, Throwable $throwable): void
    {
        parent::render($request, $throwable);
    }
}