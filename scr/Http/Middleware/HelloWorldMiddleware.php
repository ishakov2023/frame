<?php

namespace App\Http\Middleware;

use App\Http\Middleware\interface\Middleware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldMiddleware implements Middleware
{
    public function handle(Request $request, callable $next): Response
    {
        if (!empty($request)){
           echo ('Hello World');
        }
        return $next($request);
    }
}
