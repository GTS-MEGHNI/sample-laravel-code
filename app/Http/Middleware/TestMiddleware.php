<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 *
 */
class TestMiddleware
{

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     * @throws Throwable
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*$token = $request->bearerToken();
        abort_if(true, Response::HTTP_UNAUTHORIZED);
        throw_if(true, new HttpRequestException('', Response::HTTP_CONFLICT));*/
        return $next($request);
    }

}
