<?php

namespace App\Http\Requests;

use App\Http\Handler\interface\Handler;
use App\Http\Handler\PipeLine;
use App\Http\Middleware\interface\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    /**
     * @param Handler $handler
     * @param list<Middleware> $middlewares
     */
    public function __construct(
        private readonly Handler $handler,
        private readonly array $middlewares,
    ) {
    }

    public function handle(Request $request): Response
    {
        return (new PipeLine($this->handler, $this->middlewares))->handle($request);
    }
}
